<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBalanceChangesHistoryTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('balance_changes_history', function (Blueprint $table) {
			$table->id();
			$table->decimal('amount', 20, 7);
			$table->bigInteger('user_id')->unsigned();
			$table->string('description');
			$table->bigInteger('payment_id')->unsigned()->nullable();
			$table->integer('created_at')->unsigned();
			$table->integer('updated_at')->unsigned();
			
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->foreign('payment_id')->references('id')->on('payments')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('balance_changes_history');
	}
}
