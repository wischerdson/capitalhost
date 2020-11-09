<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('persons', function (Blueprint $table) {
			$table->id();
			$table->bigInteger('user_id')->unsigned();
			$table->string('passport_series');
			$table->string('passport_number');
			$table->string('passport_department');
			$table->string('passport_issue_date');
			$table->string('birth_date');
			$table->string('full_name');
			$table->string('address');
			$table->string('phone');
			$table->string('email');
			$table->integer('created_at')->unsigned();

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
		Schema::dropIfExists('persons');
	}
}
