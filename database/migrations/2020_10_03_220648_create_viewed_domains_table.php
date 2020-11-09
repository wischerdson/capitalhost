<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViewedDomainsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('viewed_domains', function (Blueprint $table) {
			$table->id();
			$table->bigInteger('user_id')->unsigned()->nullable();
			$table->string('domain');
			$table->boolean('available');
			$table->integer('times_checked')->unsigned()->default(1);
			$table->integer('viewed_at')->unsigned();

			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('viewed_domains');
	}
}
