<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanAdvantage extends Model
{
	protected $table = 'plans_advantages';
	protected $guarded = [];
	public $timestamps = false;

	public function plan()
	{
		return $this->belongsTo(\App\Plan::class);
	}
}
