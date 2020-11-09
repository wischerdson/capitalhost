<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\User;
use App\Plan;
use App\BalanceChangesHistory;
use App\Services\Discount;

class DecreaseBalance extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'balance:decrease';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = '';

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
	 * @return mixed
	 */
	public function handle()
	{
		User::where('balance', '>', '0')->whereNotNull('selected_plan_id')->chunk(200, function ($users) {
		    foreach ($users as $user) {
		        $this->handleUser($user);
		    }
		});
	}

	private function handleUser(User $user)
	{
		$discount = new Discount($user);
		$planAmount = $discount->getPlanAmount();

		$planAmountPerHour = $planAmount/24;

		$timeDiff_S = now()->unix() - $user->defrosted_at;
		$timeDiff_H = min($timeDiff_S/3600, 1);

		$toPay = $planAmountPerHour*$timeDiff_H;

		$user->balance -= $toPay;
		$user->save();

		$this->info('Balance of the user '.$user->id.' has been decreased on '.$toPay.' (balance is now '.$user->balance.')');

		$this->saveBalanceChange($user, $toPay);
	}

	private function saveBalanceChange(User $user, $toPay)
	{
		$month = [
			now()->startOfMonth()->unix(),
			now()->endOfMonth()->unix()
		];
		$user->load(['balanceHistory' => function ($q) use ($month) {
			$q->where('description', 'Оплата услуг хостинга')->whereBetween('created_at', $month);
		}]);

		$balanceHistory = $user->balanceHistory->isEmpty() ? new BalanceChangesHistory : $user->balanceHistory[0];

		$balanceHistory->description = 'Оплата услуг хостинга';
		$balanceHistory->amount -= $toPay;
		$user->balanceHistory()->save($balanceHistory);
	}
}
