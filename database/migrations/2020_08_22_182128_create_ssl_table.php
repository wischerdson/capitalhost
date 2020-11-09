<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSslTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ssl', function (Blueprint $table) {
			$table->smallIncrements('id');
			$table->string('name');
			$table->string('description');
			$table->boolean('visible')->default(true);
			$table->integer('amount')->unsigned()->comment('Per year');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('ssl');
	}
}
