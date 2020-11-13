<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\AdminModels\Task;

class UsersController extends Controller
{
	public function get(Request $request)
	{
		$model = User::with('plan', 'purchasedSsl', 'domains', 'adminTasks');

		$search = $request->input('search');
		if ($search) {
			$search = '%'.$search.'%';
			$model->where('first_name', 'like', $search)
				->orWhere('last_name', 'like', $search)
				->orWhere('company', 'like', $search)
				->orWhere('email', 'like', $search)
				->orWhere('id', 'like', $search)
				->orWhereHas('domains', function ($query) use ($search) {
					$query->where('name', 'like', $search);
				});
		}

		$this->sort($request, $model);

		$users = $model->paginate(70);
		$users->makeVisible(['password']);

		return $users;
	}

	private function sort(Request $request, $model)
	{
		$sortBy = $request->input('sortBy');
		$order = $request->input('order') ?? 'asc';

		$model->selectRaw('`users`.*, (SELECT COUNT(`admin_tasks`.`id`) FROM `admin_tasks` WHERE `admin_tasks`.`user_id` = `users`.`id` AND `admin_tasks`.`status` IN(0, 1)) AS `tasks_count`');

		$model->orderBy($sortBy, $order);
		$model->orderBy('created_at', 'asc');
	}
}