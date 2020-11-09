<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchasedSsl extends Model
{
    protected $table = 'purchased_ssl';
	protected $dateFormat = 'U';
	protected $guarded = [];
	
	const UPDATED_AT = null;
	const CREATED_AT = 'purchased_at';

	public function domains()
	{
		return $this->hasMany(\App\Domain::class);
	}

	public function user()
	{
		return $this->belongsTo(\App\User::class);
	}

	public function ssl()
	{
		return $this->belongsTo(\App\Ssl::class);
	}

	public static function boot()
	{
		parent::boot();
		self::creating(function ($model) {
			$model->renew_in = now()->addYear()->unix();
		});
	}
}
