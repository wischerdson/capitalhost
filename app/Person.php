<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
	protected $table = 'persons';
	protected $dateFormat = 'U';
	protected $guarded = ['id', 'user_id', 'created_at'];
	
	const UPDATED_AT = null;

	public function domains()
	{
		return $this->hasMany(\App\Domain::class);
	}

	public function user()
	{
		return $this->belongsTo(\App\User::class);
	}
}
