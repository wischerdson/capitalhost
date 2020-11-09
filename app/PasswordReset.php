<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Str;

class PasswordReset extends Model
{
	protected $table = 'password_resets';
	protected $dateFormat = 'U';
	protected $guarded = [];
	
	const UPDATED_AT = null;

	public static function boot()
	{
		parent::boot();
		self::creating(function ($model) {
			$model->token = Str::random(60);
			$model->expire_at = now()->addMinutes(30)->unix();
		});
	}

	protected static function booted()
	{
		static::addGlobalScope(new \App\Scopes\PasswordResetScope);
	}
}
