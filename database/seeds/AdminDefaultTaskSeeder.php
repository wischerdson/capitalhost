<?php

use Illuminate\Database\Seeder;

class AdminDefaultTaskSeeder extends Seeder
{
    private $table = 'admin_default_tasks';

	private function getData()
	{
		return [
			['name' => 'Хостинг', 'description' => null, 'step' => 1],
			['name' => 'Домен', 'description' => null, 'step' => 2],
			['name' => 'Макет', 'description' => null, 'step' => 3],
			['name' => 'SSL', 'description' => null, 'step' => 4],
			['name' => 'Форма', 'description' => null, 'step' => 5]
		];
	}

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table($this->table)->insert($this->getData());
    }
}
