<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDomainsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('domains', function (Blueprint $table) {
			$table->id();
			$table->bigInteger('person_id')->unsigned()->nullable();
			$table->bigInteger('user_id')->unsigned();
			$table->string('name');
			$table->boolean('auto_renew')->default(true);
			// $table->smallInteger('selected_ssl_id')->unsigned()->nullable();
			$table->smallInteger('dns_zone_id')->unsigned()->nullable();
			$table->integer('created_at')->unsigned();
			$table->integer('renew_in')->unsigned();

			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->foreign('person_id')->references('id')->on('persons')->onDelete('cascade');
			// $table->foreign('selected_ssl_id')->references('id')->on('purchased_ssl')->onDelete('cascade');
			$table->foreign('dns_zone_id')->references('id')->on('dns_zones')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('domains');
	}
}
