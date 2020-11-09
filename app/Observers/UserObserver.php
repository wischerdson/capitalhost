<?php

namespace App\Observers;

use App\User;
use App\Notifications\AccountFreezing as AccountFreezingNotification;
use App\Notifications\Admin\NewUser as NewUserNotification;
use App\Services\Discount;
use App\AdminModels\Task;
use App\AdminModels\DefaultTask;

class UserObserver
{
	public function created(User $user)
	{
		$user->notify(new NewUserNotification());
		$this->defaultTasks($user);
	}

	public function saving(User $user)
	{
		if ($user->isDirty('balance')) {
			$user->loadMissing('plan');
			$discount = new Discount($user);
			
			$remaining = ceil($discount->getTotalPeriod());
			$user->freeze_in = $remaining;

			if ($remaining == 72 or $remaining == 24) {
				$user->notify(new AccountFreezingNotification($remaining));
			}
		}
	}

	private function defaultTasks($user)
	{
		$defTasks = DefaultTask::all()->makeHidden('id');
		$defTasks = $defTasks->map(function ($item, $key) use ($user) {
			$item->user_id = $user->id;
			return $item;
		});
		Task::insert($defTasks->toArray());
	}
}
