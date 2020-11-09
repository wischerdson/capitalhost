<?php

namespace App\Http\Controllers\Guest\Auth;

use App\Http\Controllers\Guest\Controller;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

use Auth;
use Storage;
use Str;
use Mail;

use App\User;
use App\PasswordReset;
use App\Image as ImageModel;

class SignUpController extends Controller
{
	public function index()
	{
		if (Auth::guard('user')->check()) {
			return redirect()->route('account.home');
		}

		$this->template = 'sign-up';
		$this->title = 'Создание личного кабинета - CapitalHost';

		return $this->output();
	}

	public function store(Request $request)
	{
		$email = $request->input('email');
		$company = $request->input('company');

		$user = User::where('email', $email)->orWhere('company', $company)->first();

		if ($user) {
			if ($user->company === $company)
				throw new \App\Exceptions\CompanyAlreadyExistsException();

			if ($user->email === $email)
				throw new \App\Exceptions\EmailAlreadyExistsException();
		}

		$user = new User;
		$user->fill($request->all());
		$user->save();
		$user->logo = $this->logo($request, $user);
		$user->save();
		
		Auth::guard('user')->login($user, true);

		return [
			'status' => 'success',
			'redirect' => route('account.home'),
			'user_id' => $user->id
		];
	}

	private function logo(Request $request, User $user)
	{
		if (!$request->hasFile('logo'))
			return null;

		$img = Image::make($request->file('logo'));

		$img->resize(2560, 2048, function ($constraint) {
			$constraint->aspectRatio();
			$constraint->upsize();
		});

		$ext = 'jpg';
		$imageName = 'logo_'.$user->id.'_'.now()->unix().'.'.$ext;

		Storage::disk('public')->put($imageName, $img->encode($ext));

		$imageUrl = Storage::disk('public')->url($imageName);
		$imagePath = $this->removeDomain($imageUrl);

		return $imagePath;
	}

	private function removeDomain($url)
	{
		$withoutProtocolDelimiter = str_replace('//', '', $url);
		return substr($withoutProtocolDelimiter, strpos($withoutProtocolDelimiter, '/'));
	}
}
