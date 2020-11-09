<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
	return [
		'email' => $faker->unique()->email,
		'first_name' => $faker->firstName,
		'last_name' => $faker->lastName,
		'company' => $faker->unique()->company,
		'password' => $faker->password
	];
});


/*
$table->string('email')->unique();
$table->string('password');
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
*/