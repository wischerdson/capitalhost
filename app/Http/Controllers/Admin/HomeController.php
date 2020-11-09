<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
    	$this->title = 'Manager - CapitalHost';
    	$this->template = 'home';

    	return $this->output();
    }
}
