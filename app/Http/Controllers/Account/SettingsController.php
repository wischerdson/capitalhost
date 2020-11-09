<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Plan;

class SettingsController extends Controller
{
	public function index()
	{
		$this->title = 'Настройки';
		$this->template = 'settings';

		return $this->output();
	}

	public function selectPlan($planId)
	{
		$plan = Plan::where('id', $planId)->where('visible', 1)->first();

		if (!$plan)
			throw new \App\Exceptions\PlanNotFoundException();

		$this->user->selected_plan_id = $planId;
		$this->user->save();

		return [
			'status' => 'success',
			'selected_plan' => $plan->makeHidden(['visible', 'plans_category_id']),
			'redirect' => route('account.payment.index')
		];
	}
}
