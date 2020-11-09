<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use Auth;
use App\User;

class PlugController extends Controller
{
	public function index()
	{
		$this->template = 'plug';
		$this->title = 'Dashboard';

		return $this->output();
	}
}
