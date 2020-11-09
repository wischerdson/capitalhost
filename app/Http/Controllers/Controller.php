<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public function __set($property, $value)
	{
		$this->vars[$property] = $value;
	}

	public function __get($property)
	{
		return $this->vars[$property];
	}

	protected function output()
	{
		return view($this->getView())->with($this->getVars());
	}

	protected function getComponentPath($component)
	{
		return $component ? $this->namespace.'.'.$component : null;
	}
	
	protected function getView()
	{
		return $this->namespace.'.templates.'.$this->template;
	}
	
	protected function getVars()
	{
		return $this->vars;
	}
}
