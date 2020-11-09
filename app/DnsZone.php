<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DnsZone extends Model
{
	protected $table = 'dns_zones';
	protected $guarded = [];
	public $timestamps = false;
}
