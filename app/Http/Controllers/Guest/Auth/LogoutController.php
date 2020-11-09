<?php

namespace App\Http\Controllers\Guest\Auth;

use App\Http\Controllers\Guest\Controller;
use Illuminate\Http\Request;
use Auth;

class LogoutController extends Controller
{
	public function index()
	{
		Auth::guard('user')->logout();
		return redirect()->route('guest.home');
	}
}
