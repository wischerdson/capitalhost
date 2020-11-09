<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\SiteController;
use Illuminate\Http\Request;

class LegalController extends SiteController
{
	public function index()
	{
		$this->template = 'legal.index';
		$this->title = 'Документы - CapitalHost';

		return $this->output();
	}

	public function privacyPolicy()
	{
		$this->template = 'privacy-policy';
		$this->title = 'Политика о конфиденциальности';

		return $this->output();
	}

	public function terms()
	{
		$this->template = 'terms';
		$this->title = 'Правила использования';

		return $this->output();
	}
}
