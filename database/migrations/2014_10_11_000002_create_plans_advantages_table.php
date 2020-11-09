<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansAdvantagesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('plans_advantages', function (Blueprint $table) {
			$table->mediumIncrements('id');
			$table->string('text');
			$table->boolean('yes')->default(false);
			$table->smallInteger('plan_id')->unsigned();

			$table->foreign('plan_id')->references('id')->on('plans')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('plans_advantages');
	}
}
