<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasedSslTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('purchased_ssl', function (Blueprint $table) {
			$table->id();
			$table->bigInteger('user_id')->unsigned();
			$table->bigInteger('domain_id')->unsigned()->nullable();
			$table->smallInteger('ssl_id')->unsigned();
			$table->integer('purchased_at')->unsigned();
			$table->integer('renew_in')->unsigned();

			$table->foreign('user_id')->references('id')->on('users');
			$table->foreign('domain_id')->references('id')->on('domains');
			$table->foreign('ssl_id')->references('id')->on('ssl');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('purchased_ssl');
	}
}
