<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\User;
use App\PlansCategory;
use Auth;

class HomeController extends Controller
{
	public function index()
	{
		$this->template = 'home';
		$this->title = 'Панель управления хостингом - CapitalHost';

		if (is_null($this->user->selected_plan_id)) {
			$this->plans = $this->plansCategories = PlansCategory::with(['plans' => function ($query) {
				$query->where('visible', 1)->get();
			}, 'plans.advantages'])->get();
		}

		$daysLeft = floor($this->user->freeze_in/24);

		$this->daysLeft = $daysLeft;

		return $this->output();
	}
}
