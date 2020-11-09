<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('payments', function (Blueprint $table) {
			$table->id();
			$table->bigInteger('user_id')->unsigned();
			$table->string('payment_id', 20)->nullable();
			$table->decimal('amount', 20, 7);
			$table->string('method');
			$table->enum('status', [0, 1, 2, 3, 4])->comment('0 - CREATED; 1 - CONFIRMED; 2 - PAID; 3 - ERROR; 4 - CANCELED');
			$table->string('error_details')->nullable();
			$table->decimal('commission', 10, 2)->nullable();
			$table->integer('created_at')->unsigned();
			$table->integer('updated_at')->unsigned();

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
		Schema::dropIfExists('payments');
	}
}
