<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
	protected $table = 'plans';
	protected $guarded = [];
	public $timestamps = false;

	public function advantages()
	{
		return $this->hasMany(\App\PlanAdvantage::class);
	}

	public function category()
	{
		return $this->belongsTo(\App\PlansCategory::class);
	}
}
