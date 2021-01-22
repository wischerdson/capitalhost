<?php

namespace App\AdminModels;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Task extends Model
{
	use Notifiable;
	
	protected $table = 'admin_tasks';
	protected $guarded = [];
	public $timestamps = false;

	public function user()
	{
		return $this->belongsTo(\App\User::class);
	}

	protected static function booted()
	{
		static::addGlobalScope('order', function (Builder $builder) {
			$builder->orderBy('step', 'asc');
		});
	}
}
