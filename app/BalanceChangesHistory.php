<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BalanceChangesHistory extends Model
{
	protected $table = 'balance_changes_history';
	protected $dateFormat = 'U';
	protected $guarded = [];
}
