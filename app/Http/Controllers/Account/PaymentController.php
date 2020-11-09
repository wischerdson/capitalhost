<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Payment;
use App\BalanceChangesHistory;
use App\User;
use App\Services\Discount;
use App\Notifications\Admin\BalanceIncreased as BalanceIncreasedNotification;

class PaymentController extends Controller
{
	public function index()
	{
		$this->template = 'pay';
		$this->title = 'Пополнить баланс - CapitalHost';

		$this->user->load('plan');

		return $this->output();
	}

	public function create(Request $request)
	{
		$amount = $request->input('amount');
		$paymentMethod = $request->input('payment_method');
		$user = $this->user->load('plan');

		$payment = new Payment;
		$payment->amount = $amount;
		$payment->status = '0';
		$payment->method = $paymentMethod;
		$user->payments()->save($payment);


		if ($user->allow_discounts) {
			$discount = new Discount($user);
			$user->discount = $discount->getPercentByAmount($amount);
			$user->save();
		}


		$mrh_login = env('ROBOKASSA_LOGIN');
		$out_summ = $amount;
		$inv_id = $payment->id;
		$mrh_pass1 = env('ROBOKASSA_PASSWORD_1');

		$robokassaParams = [
			'MerchantLogin' => $mrh_login,
			'OutSum' => $out_summ,
			'Description' => 'Пополнение счета',
			'IncCurrLabel' => $paymentMethod,
			'InvId' => $inv_id,
			'Encoding' => 'utf-8',
			'Email' => $user->email,
			'SignatureValue' => md5("$mrh_login:$out_summ:$inv_id:$mrh_pass1"),
			'IsTest' => env('APP_DEBUG') ? 1 : 0
		];

		return [
			'status' => 'success',
			'redirect' => $this->getRedirectUrl($robokassaParams)
		];
	}

	private function getRedirectUrl($params)
	{
		$r = 'https://auth.robokassa.ru/Merchant/Index.aspx';
		$paramsStr = '';

		foreach ($params as $key => $value) {
			$paramsStr .= $paramsStr == '' ? '?' : '&';
			$paramsStr .= $key.'='.$value;
		}

		return $r.$paramsStr;
	}

	public function report(Request $request)
	{
		$mrh_pass2 = env('ROBOKASSA_PASSWORD_2');
		$amount = $request->input('OutSum');
		$paymentId = $request->input('InvId');
		$crc = strtoupper($request->input('SignatureValue'));
		$myCrc = strtoupper(md5("$amount:$paymentId:$mrh_pass2"));

		if ($myCrc != $crc) {
			throw new \App\Exceptions\IncorrectPaymentSignatureException();
		}

		$payment = Payment::find($paymentId);
		$this->pay($payment);

		return "OK$paymentId\n";
	}

	public function success()
	{
		return redirect()->route('account.home');
	}

	public function fail(Request $request)
	{
		$paymentId = $request->input('InvId');

		$payment = Payment::find($paymentId);
		$payment->status = '3';
		$payment->save();

		return 'Оплата не прошла, <a href="'.route('account.home').'">на главную</a>';
	}

	private function pay(Payment $payment)
	{
		$payment->status = '2';
		$payment->save();

		$payment->load('user');

		if ($payment->user->balance <= 0) {
			$payment->user->defrosted_at = now()->unix();
		}

		if ($payment->user->allow_discounts) {
			$discount = new Discount($payment->user);
			$discountPeriod = $discount->getPeriodByAmount($payment->amount);

			$payment->user->allow_discounts = false;
			$payment->user->discount_expire_at = now()->addDays($discountPeriod)->unix();
			$payment->user->save();
		}

		$payment->user->balance += $payment->amount;
		$payment->user->allow_discounts = false;
		$payment->user->save();

		$balanceHistory = new BalanceChangesHistory;
		$balanceHistory->amount = $payment->amount;
		$balanceHistory->payment_id = $payment->id;
		$balanceHistory->description = 'Внесение средств на счет';
		$payment->user->balanceHistory()->save($balanceHistory);

		$payment->user->notify(new BalanceIncreasedNotification());
	}
}