<?php

namespace App\Console\Commands\Admin;

use Illuminate\Console\Command;
use App\AdminModels\Task as AdminTask;
use App\Notifications\Admin\ReleaseTask as ReleaseTaskNotification;

class ReleaseTasks extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'admin_tasks:release';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Release all admin tasks on schedule';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return int
	 */
	public function handle()
	{
		$scheduledTasks = AdminTask::where('notify_at', '<=', now()->unix())->get();

		$this->info("now: ".now()->unix());

		foreach ($scheduledTasks as $task) {
			$task->load('user');
			$task->notify(new ReleaseTaskNotification());
			$task->notify_at = null;
			$task->save();
		}
	}
}
