<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Http\Request;
use Auth;

class Controller extends BaseController
{
	protected $template;
	protected $vars = [];
	protected $namespace = 'account';

	public function __construct()
	{
		$this->ogImage = '';
		$this->title = 'Untitled page';
		$this->description = '';
		$this->setLayout('default-layout');
		$this->setHeader('sections.header');
		$this->setSidebar('sections.sidebar');
		$this->setFooter('sections.footer');

		$this->user = Auth::guard('user')->user();
		$this->middleware(function ($request, $next) {
            $this->user = Auth::guard('user')->user();
            return $next($request);
        });
	}

	protected function setHeader($header)
	{
		$this->header = $this->getComponentPath($header);
	}

	protected function setFooter($footer)
	{
		$this->footer = $this->getComponentPath($footer);
	}

	protected function setSidebar($sidebar)
	{
		$this->sidebar = $this->getComponentPath($sidebar);
	}

	protected function setLayout($layout)
	{
		$this->layout = $this->getComponentPath($layout);
	}
}
