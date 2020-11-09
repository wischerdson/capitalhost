<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;

class AvailabilityController extends Controller
{
	public function available($id)
	{
		$user = User::find($id);

		if (!$user) {
			return [
				'status' => 'error',
				'message' => 'User not found'
			];
		}

		return $user->balance > 0 ? 1 : 0;
	}
}
