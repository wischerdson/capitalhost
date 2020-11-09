<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\PlansCategory;

class HomeController extends Controller
{
    public function index()
	{
		$this->title = 'Главная - CapitalHost';
		$this->template = 'home';

		$this->plansCategories = PlansCategory::with(['plans' => function ($query) {
			$query->where('visible', 1)->get();
		}, 'plans.advantages'])->get();

		return $this->output();
	}
}
