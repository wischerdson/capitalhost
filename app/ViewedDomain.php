<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ViewedDomain extends Model
{
	protected $table = 'viewed_domains';
	protected $guarded = [];
	public $timestamps = false;

	public static function boot()
	{
		parent::boot();
		self::creating(function ($model) {
			$model->viewed_at = now()->unix();
		});
	}
}
