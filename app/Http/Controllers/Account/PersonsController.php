<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Person;

class PersonsController extends Controller
{
	public function create(Request $request)
	{
		$person = new Person;
		$person->fill($request->all());
		$this->user->persons()->save($person);

		return [
			'status' => 'success',
			'person_id' => $person->id
		];
	}
}
