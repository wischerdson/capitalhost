<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Http\Request;

class Controller extends BaseController
{
	protected $template;
	private $vars = [];
	private $namespace = 'admin';

	public function __construct()
	{
		$this->title = 'Untitled page';
		$this->layout = $this->namespace.'.layout';
	}

	public function __set($property, $value)
	{
		$this->vars[$property] = $value;
	}

	public function getView()
	{
		return $this->namespace.'.templates.'.$this->template;
	}

	public function getVars()
	{
		return $this->vars;
	}

	protected function output()
	{
		return view($this->getView())->with($this->getVars());
	}
}
