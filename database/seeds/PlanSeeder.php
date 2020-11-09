<?php

use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$data = [
			'plans_categories' => [
				['id' => 1, 'name' => 'Эконом'],
				['id' => 2, 'name' => 'Скоростные'],
				['id' => 3, 'name' => 'Премиум']
			],
			'plans' => [
				['id' => 1, 'amount' => '2',  'name' => 'Demo',            'description' => 'Подойдёт для статичной html страницы',                'plans_category_id' => 1],
				['id' => 2, 'amount' => '5',  'name' => 'Basic',           'description' => 'Удобен для персональной <br>страницы',                'plans_category_id' => 1],
				['id' => 3, 'amount' => '7',  'name' => 'Advanced',        'description' => 'Оптимальное предложение для микроблога',              'plans_category_id' => 1],
				['id' => 4, 'amount' => '17', 'name' => 'Landing',         'description' => 'Идеальный вариант <br>для Landing Page',              'plans_category_id' => 2],
				['id' => 5, 'amount' => '25', 'name' => 'Corporate',       'description' => 'Доступный вариант для сайта компании',                'plans_category_id' => 2],
				['id' => 6, 'amount' => '32', 'name' => 'E-commerce',      'description' => 'Решение для небольшого интернет-магазина',            'plans_category_id' => 2],
				['id' => 7, 'amount' => '45', 'name' => 'Corporate Plus',  'description' => 'Расширенные мощности для сайта крупной компании',     'plans_category_id' => 3],
				['id' => 8, 'amount' => '58', 'name' => 'E-commerce Plus', 'description' => 'Максимальное решение для крупного интернет-магазина', 'plans_category_id' => 3],
				['id' => 9, 'amount' => '74', 'name' => 'Unlimited',       'description' => 'Максимум мощности для масштабных проектов',           'plans_category_id' => 3],
			],
			'plans_advantages' => [
				['text' => 'Круглосуточная поддержка',           'yes' => true,   'plan_id' => 1],
				['text' => 'Поддержка PHP, MySQL, Perl, Python', 'yes' => false,  'plan_id' => 1],
				['text' => 'Подключение по SSH',                 'yes' => false,  'plan_id' => 1],
				['text' => 'Акселератор PHP',                    'yes' => false,  'plan_id' => 1],
				['text' => 'Память для кэширования',             'yes' => false,  'plan_id' => 1],
				['text' => 'Резервное копирование',              'yes' => false,  'plan_id' => 1],
				['text' => 'Круглосуточная поддержка',           'yes' => true,   'plan_id' => 2],
				['text' => 'Поддержка PHP, MySQL, Perl, Python', 'yes' => true,   'plan_id' => 2],
				['text' => 'Подключение по SSH',                 'yes' => false,  'plan_id' => 2],
				['text' => 'Акселератор PHP',                    'yes' => false,  'plan_id' => 2],
				['text' => 'Память для кэширования',             'yes' => false,  'plan_id' => 2],
				['text' => 'Резервное копирование',              'yes' => false,  'plan_id' => 2],
				['text' => 'Круглосуточная поддержка',           'yes' => true,   'plan_id' => 3],
				['text' => 'Поддержка PHP, MySQL, Perl, Python', 'yes' => true,   'plan_id' => 3],
				['text' => 'Подключение по SSH',                 'yes' => true,   'plan_id' => 3],
				['text' => 'Акселератор PHP',                    'yes' => false,  'plan_id' => 3],
				['text' => 'Память для кэширования',             'yes' => false,  'plan_id' => 3],
				['text' => 'Резервное копирование',              'yes' => false,  'plan_id' => 3],
				['text' => 'Круглосуточная поддержка',           'yes' => true,   'plan_id' => 4],
				['text' => 'Поддержка PHP, MySQL, Perl, Python', 'yes' => true,   'plan_id' => 4],
				['text' => 'Подключение по SSH',                 'yes' => true,   'plan_id' => 4],
				['text' => 'Акселератор PHP',                    'yes' => true,   'plan_id' => 4],
				['text' => 'Память для кэширования',             'yes' => false,  'plan_id' => 4],
				['text' => 'Резервное копирование',              'yes' => false,  'plan_id' => 4],
				['text' => 'Круглосуточная поддержка',           'yes' => true,   'plan_id' => 5],
				['text' => 'Поддержка PHP, MySQL, Perl, Python', 'yes' => true,   'plan_id' => 5],
				['text' => 'Подключение по SSH',                 'yes' => true,   'plan_id' => 5],
				['text' => 'Акселератор PHP',                    'yes' => true,   'plan_id' => 5],
				['text' => 'Память для кэширования',             'yes' => true,   'plan_id' => 5],
				['text' => 'Резервное копирование',              'yes' => false,  'plan_id' => 5],
				['text' => 'Круглосуточная поддержка',           'yes' => true,   'plan_id' => 6],
				['text' => 'Поддержка PHP, MySQL, Perl, Python', 'yes' => true,   'plan_id' => 6],
				['text' => 'Подключение по SSH',                 'yes' => true,   'plan_id' => 6],
				['text' => 'Акселератор PHP',                    'yes' => true,   'plan_id' => 6],
				['text' => 'Память для кэширования',             'yes' => true,   'plan_id' => 6],
				['text' => 'Резервное копирование',              'yes' => true,   'plan_id' => 6],
				['text' => 'Круглосуточная поддержка',           'yes' => true,   'plan_id' => 7],
				['text' => 'Поддержка PHP, MySQL, Perl, Python', 'yes' => true,   'plan_id' => 7],
				['text' => 'Подключение по SSH',                 'yes' => true,   'plan_id' => 7],
				['text' => 'Акселератор PHP',                    'yes' => true,   'plan_id' => 7],
				['text' => 'Память для кэширования',             'yes' => true,   'plan_id' => 7],
				['text' => 'Резервное копирование',              'yes' => true,   'plan_id' => 7],
				['text' => 'Круглосуточная поддержка',           'yes' => true,   'plan_id' => 8],
				['text' => 'Поддержка PHP, MySQL, Perl, Python', 'yes' => true,   'plan_id' => 8],
				['text' => 'Подключение по SSH',                 'yes' => true,   'plan_id' => 8],
				['text' => 'Акселератор PHP',                    'yes' => true,   'plan_id' => 8],
				['text' => 'Память для кэширования',             'yes' => true,   'plan_id' => 8],
				['text' => 'Резервное копирование',              'yes' => true,   'plan_id' => 8],
				['text' => 'Круглосуточная поддержка',           'yes' => true,   'plan_id' => 9],
				['text' => 'Поддержка PHP, MySQL, Perl, Python', 'yes' => true,   'plan_id' => 9],
				['text' => 'Подключение по SSH',                 'yes' => true,   'plan_id' => 9],
				['text' => 'Акселератор PHP',                    'yes' => true,   'plan_id' => 9],
				['text' => 'Память для кэширования',             'yes' => true,   'plan_id' => 9],
				['text' => 'Резервное копирование',              'yes' => true,   'plan_id' => 9],
			]
		];

		foreach ($data as $key => $value) {
			DB::table($key)->insert($value);
		}
	}
}
