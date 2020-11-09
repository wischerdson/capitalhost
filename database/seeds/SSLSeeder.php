<?php

use Illuminate\Database\Seeder;

class SSLSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$data = [
			'ssl' => [
				['id' => 1, 'name' => 'DomainSSL', 'description' => 'Начальный уровень доверия', 'amount' => 1379],
				['id' => 2, 'name' => 'OrganizationSSL', 'description' => 'Бизнес-уровень доверия', 'amount' => 2150],
				['id' => 3, 'name' => 'ExtendedSSL', 'description' => 'Расширенный уровень доверия', 'amount' => 4270],
			]
		];

		foreach ($data as $key => $value) {
			DB::table($key)->insert($value);
		}
	}
}
