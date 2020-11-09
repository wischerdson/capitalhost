<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('plans', function (Blueprint $table) {
			$table->smallIncrements('id');
			$table->integer('amount')->unsigned()->comment('per day');
			$table->string('name');
			$table->string('description');
			$table->boolean('visible')->default(true);
			$table->smallInteger('plans_category_id')->unsigned();

			$table->foreign('plans_category_id')->references('id')->on('plans_categories')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('plans');
	}
}
