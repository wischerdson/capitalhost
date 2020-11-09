<?php

namespace App\AdminModels;

use Illuminate\Database\Eloquent\Model;

class DefaultTask extends Model
{
	protected $table = 'admin_default_tasks';
	protected $guarded = [];
	public $timestamps = false;
}
