<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AdminModels\Task;

class TasksController extends Controller
{
	public function create(Request $request)
	{
		$givingTask = $request->input('task');
		$task = new Task;
		$task->fill($givingTask);
		$task->save();

		return ['status' => 'success', 'task' => $task];
	}

	public function update(Request $request)
	{
		$task = $request->input('task');
		$task = Task::where('id', $task['id'])->update($task);

		return ['status' => 'success'];
	}

	public function delete(Request $request)
	{
		$givingTask = $request->input('task');

		$tasks = Task::where('user_id', $givingTask['user_id'])->get();

		$step = 1;
		foreach ($tasks as $task) {
			if ($task->id == $givingTask['id']) {
				$task->delete();
				continue;
			}

			$task->step = $step;
			$task->save();

			$step++;
		}

		return ['status' => 'success'];
	}
}
