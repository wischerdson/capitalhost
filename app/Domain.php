<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
	protected $table = 'domains';
	protected $dateFormat = 'U';
	protected $guarded = [];
	
	const UPDATED_AT = null;

	public function ssl()
	{
		$this->belongsTo(\App\Ssl::class, 'selected_ssl_id');
	}

	public function person()
	{
		$this->belongsTo(\App\Person::class);
	}

	public static function boot()
	{
		parent::boot();
		self::creating(function ($model) {
			$model->renew_in = now()->addYear()->unix();
		});
	}
}
