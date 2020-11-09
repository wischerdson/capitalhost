<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Ssl;
use App\PurchasedSsl;
use App\BalanceChangesHistory;

class SSLController extends Controller
{
    public function index()
	{
		$this->template = 'ssl';
		$this->title = 'Приобрести SSL - CapitalHost';


		$this->ssl = Ssl::where('visible', 1)->orderBy('amount', 'ASC')->get();

		return $this->output();
	}

	public function buy(Request $request)
	{
		$sslId = $request->input('ssl_id');

		$ssl = Ssl::find($sslId);

		if (!$ssl)
			throw new \App\Exceptions\SSLNotFoundException;

		if ($this->user->balance < $ssl->amount)
			throw new \App\Exceptions\InsufficientFundsException;

		$pSSL = new PurchasedSsl;
		$pSSL->ssl_id = $ssl->id;
		$this->user->purchasedSsl()->save($pSSL);

		$this->user->balance -= $ssl->amount;
		$this->user->save();

		$balanceHistory = new BalanceChangesHistory;
		$balanceHistory->description = 'Оплата SSL-сертификата '.$ssl->name;
		$balanceHistory->amount = -$ssl->amount;
		$this->user->balanceHistory()->save($balanceHistory);

		return [
			'status' => 'success'
		];
	}
}
