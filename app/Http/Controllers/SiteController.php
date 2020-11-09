<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    protected $template;
	protected $vars = [];
	protected $title;
	protected $description;
	protected $ogImage;
	protected $layout;

	protected function output()
	{
		$this->vars['title'] = $this->title;
		$this->vars['description'] = $this->description;
		$this->vars['template'] = $this->template;
		$this->vars['ogImage'] = $this->ogImage ?? asset('/image/social-media-banner.png');

		return view($this->layout.'.layout')->with($this->vars);
	}
}
