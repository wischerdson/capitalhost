<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ssl extends Model
{
	protected $table = 'ssl';
	protected $guarded = [];
	public $timestamps = false;

	public function domains()
	{
		return $this->hasMany(\App\PurchasedDomain::class);
	}
}
