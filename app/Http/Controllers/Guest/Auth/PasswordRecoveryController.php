<?php

namespace App\Http\Controllers\Guest\Auth;

use App\Http\Controllers\Guest\Controller;
use Illuminate\Http\Request;

use Str;
use Mail;
use Auth;
use App\User;
use App\PasswordReset;

class PasswordRecoveryController extends Controller
{
    public function index()
	{
		$this->template = 'password-recovery';
		$this->title = 'Сброс пароля - CapitalHost';

		return $this->output();
	}

	public function checkEmail(Request $request)
	{
		$email = $request->input('email');

		$user = User::where('email', $email)->first();
		
		if (!$user) {
			throw new \App\Exceptions\EmailDoesNotExistsException();
		}

		$passwordReset = new PasswordReset;
		$passwordReset->token = Str::random(60);
		$user->passwordReset()->save($passwordReset);

		Mail::to($email)->queue(new \App\Mail\PasswordReset(['user' => $user, 'token' => $passwordReset->token]));

		return [
			'status' => 'success'
		];
	}

	public function showPasswordChangeForm(Request $request)
	{
		$user = $request->input('user');
		$token = $user->passwordReset[0]->token;

		$this->template = 'change-password';
		$this->title = 'Изменение пароля - CapitalHost';

		$this->changePasswordUrl = route('guest.auth.password-recovery.password-change', [
			'user_id' => $user->id,
			'token' => $token
		]);

		return $this->output();
	}
   
	public function passwordChange(Request $request)
	{
		$user = $request->input('user');
		$password = $request->input('password');

		$user->password = $password;
		$user->save();

		$passwordReset = $user->passwordReset[0];
		$passwordReset->expire_at = 0;

		$user->passwordReset()->save($passwordReset);


		Auth::guard('user')->logoutOtherDevices($password);

		return route('account.home');
	}
}
