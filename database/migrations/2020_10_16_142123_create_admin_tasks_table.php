<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminTasksTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('admin_tasks', function (Blueprint $table) {
			$table->id();
			$table->bigInteger('user_id')->unsigned();
			$table->string('name');
			$table->text('description')->nullable();
			$table->tinyInteger('step')->default(1);
			$table->integer('notify_at')->unsigned()->nullable();
			$table->enum('status', [0, 1, 2])->comment('0 - NOT ACCEPTED; 1 - ACCEPTED; 2 - COMPLETE')->default(0);
			$table->boolean('deleted')->default(false);

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
		Schema::dropIfExists('admin_tasks');
	}
}
