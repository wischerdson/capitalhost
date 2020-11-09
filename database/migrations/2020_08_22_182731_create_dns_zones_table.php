<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDnsZonesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dns_zones', function (Blueprint $table) {
			$table->smallIncrements('id');
			$table->integer('registration_amount')->unsigned();
			$table->integer('renew_amount')->unsigned();
			$table->string('tld');
			$table->string('tld_ascii');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('dns_zones');
	}
}
