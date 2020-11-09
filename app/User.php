<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
	use Notifiable;

	protected $table = 'users';
	protected $dateFormat = 'U';
	protected $hidden = ['password', 'remember_token'];
	protected $fillable = ['first_name', 'last_name', 'email', 'company', 'password'];

	const UPDATED_AT = null;

	public function balanceHistory()
	{
		return $this->hasMany(\App\BalanceChangesHistory::class);
	}

	public function balance()
	{
		return round($this->balance, 2);
	}

	public function plan()
	{
		return $this->belongsTo(\App\Plan::class, 'selected_plan_id');
	}

	public function passwordReset()
	{
		return $this->hasMany(\App\PasswordReset::class);
	}

	public function payments()
	{
		return $this->hasMany(\App\Payment::class);
	}

	public function persons()
	{
		return $this->hasMany(\App\Person::class);
	}

	public function viewedDomains()
	{
		return $this->hasMany(\App\ViewedDomain::class);
	}

	public function domains()
	{
		return $this->hasMany(\App\Domain::class);
	}

	public function purchasedSsl()
	{
		return $this->hasMany(\App\PurchasedSsl::class);
	}

	public function getPasswordAttribute($value)
	{
		return decrypt($value);
	}

	public function setPasswordAttribute($value)
	{
		$this->attributes['password'] = encrypt($value);
	}

	public function setFirstNameAttribute($value)
	{
		$this->attributes['first_name'] = ucfirst($value);
	}

	public function setLastNameAttribute($value)
	{
		$this->attributes['last_name'] = ucfirst($value);
	}

	public function adminTasks()
	{
		return $this->hasMany(\App\AdminModels\Task::class);
	}

	public static function boot()
	{
		parent::boot();
		self::creating(function ($model) {
			$model->last_activity_at = now()->unix();
		});
	}
}
