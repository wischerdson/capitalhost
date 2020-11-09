<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlansCategory extends Model
{
	protected $table = 'plans_categories';
	protected $guarded = [];
	public $timestamps = false;

	public function plans()
	{
		return $this->hasMany(\App\Plan::class);
	}
}
