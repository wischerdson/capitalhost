<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\TildaFormdata;

class TildaController extends Controller
{
	public function repeat(Request $request)
	{
		return $request->input();
	}

	public function notifyByEmail(Request $request)
	{
		$formData = collect($request->input());
		$accountId = $request->input('personal_account');

		$formData = $formData->filter(function ($value, $key) {
			switch ($key) {
				case 'formservices':
					return false;
					break;
				case 'personal_account':
					return false;
					break;
				case 'form-spec-comments':
					return false;
					break;
			}
			return !preg_match('/^tildaspec/', $key);
		});

		$payment = $formData->has('tildapayment') ? json_decode($formData['tildapayment']) : [];
		$formData = $formData->except('tildapayment');

		switch ($accountId) {
			case '30131':
				$to = 'shashlychniy.dvorik67@yandex.ru';
				break;
		}
		$user = \App\User::where('account_number', $accountId)->with('description')->first();

		\Mail::to($to)->send(new TildaFormdata($user, $formData, $payment));

		return ['message' => 'Спасибо за заказ. Вам перезвонит менеджер.'];
	}
}
