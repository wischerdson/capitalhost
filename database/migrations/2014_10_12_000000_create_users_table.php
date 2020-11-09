<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function (Blueprint $table) {
			$table->id();
			$table->string('email')->unique();
			$table->text('password');
			$table->string('first_name');
			$table->string('last_name');
			$table->string('company')->unique();
			$table->string('logo')->nullable();
			$table->decimal('balance', 20, 7)->default(0);
			$table->smallInteger('selected_plan_id')->unsigned()->nullable();
			$table->tinyInteger('discount')->unsigned()->default(0);
			$table->boolean('allow_discounts')->default(true);
			$table->integer('discount_expire_at')->unsigned()->default(0);
			$table->integer('created_at')->unsigned();
			$table->integer('freeze_in')->unsigned()->default(0);
			$table->integer('defrosted_at')->unsigned()->default(0);
			$table->integer('last_activity_at')->unsigned();
			$table->integer('email_verified_at')->nullable()->unsigned();
			$table->rememberToken();

			$table->foreign('selected_plan_id')->references('id')->on('plans');
		});


		DB::statement("ALTER TABLE users AUTO_INCREMENT = 30120;");
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('users');
	}
}
