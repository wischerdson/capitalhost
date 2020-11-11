<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
	public function get()
	{
		$users = User::with('plan', 'purchasedSsl', 'domains', 'adminTasks')->paginate(70);
		$users->makeVisible(['password']);

		return $users;
	}

	public function search(Request $request)
	{
		$search = $request->input('search');
		$search = '%'.$search.'%';

		$users = User::where('first_name', 'like', $search)
			->orWhere('last_name', 'like', $search)
			->orWhere('company', 'like', $search)
			->orWhere('email', 'like', $search)
			->orWhere('id', 'like', $search)
			->orWhereHas('domains', function ($query) use ($search) {
				$query->where('name', 'like', $search);
			})
			->with('plan', 'purchasedSsl', 'domains', 'adminTasks')
			->paginate(70);

		$users->makeVisible(['password']);

		return $users;
	}
}
