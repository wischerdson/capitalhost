<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Http\Request;

class Controller extends BaseController
{
	protected $template;
	protected $vars = [];
	protected $namespace = 'guest';

	public function __construct()
	{
		$this->ogImage = '';
		$this->title = 'Untitled page';
		$this->description = '';
		$this->setLayout('default-layout');
		$this->setHeader('sections.header');
		$this->setFooter('sections.footer');
	}

	protected function setHeader($header)
	{
		$this->header = $this->getComponentPath($header);
	}

	protected function setFooter($footer)
	{
		$this->footer = $this->getComponentPath($footer);
	}

	protected function setLayout($layout)
	{
		$this->layout = $this->getComponentPath($layout);
	}
}
