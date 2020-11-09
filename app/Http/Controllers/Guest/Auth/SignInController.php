<?php

namespace App\Http\Controllers\Guest\Auth;

use App\Http\Controllers\Guest\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;

class SignInController extends Controller
{
	public function index()
	{
		$this->template = 'sign-in';
		$this->title = 'Вход в личный кабинет - CapitalHost';

		return $this->output();
	}

	public function authenticate(Request $request)
	{
		$email = $request->input('email');
		$password = $request->input('password');

		$user = User::where('email', $email)->first();

		if (!$user)
			throw new \App\Exceptions\IncorrectAuthDataException();

		if ($password !== $user->password)
			throw new \App\Exceptions\IncorrectAuthDataException();

		Auth::guard('user')->login($user, true);
		
		return [
			'status' => 'success'
		];
	}
}
