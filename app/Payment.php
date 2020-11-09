<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
	protected $table = 'payments';
	protected $dateFormat = 'U';
	protected $guarded = [];

	public function user()
	{
		return $this->belongsTo(\App\User::class);
	}

	public function balanceHistory()
	{
		return $this->hasOne(\App\BalanceChangesHistory::class);
	}
}
