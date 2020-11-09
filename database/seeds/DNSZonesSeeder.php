<?php

use Illuminate\Database\Seeder;

class DNSZonesSeeder extends Seeder
{
	private $table = 'dns_zones';

	private function getData()
	{
		return [
			['registration_amount' => 1490, 'renew_amount' => 1990, 'tld' => 'ru'],
			['registration_amount' => 1490, 'renew_amount' => 1990, 'tld' => 'рф'],
			['registration_amount' => 966, 'renew_amount' => 480, 'tld' => 'com.ru'],
			['registration_amount' => 552, 'renew_amount' => 480, 'tld' => 'spb.ru'],
			['registration_amount' => 580, 'renew_amount' => 580, 'tld' => 'moscow'],
			['registration_amount' => 580, 'renew_amount' => 580, 'tld' => 'su'],
			['registration_amount' => 580, 'renew_amount' => 580, 'tld' => 'москва'],
			['registration_amount' => 980, 'renew_amount' => 980, 'tld' => 'biz'],
			['registration_amount' => 980, 'renew_amount' => 980, 'tld' => 'com'],
			['registration_amount' => 980, 'renew_amount' => 980, 'tld' => 'eu'],
			['registration_amount' => 980, 'renew_amount' => 980, 'tld' => 'info'],
			['registration_amount' => 980, 'renew_amount' => 980, 'tld' => 'net'],
			['registration_amount' => 980, 'renew_amount' => 980, 'tld' => 'org'],
			['registration_amount' => 1050, 'renew_amount' => 1050, 'tld' => 'name'],
			['registration_amount' => 1050, 'renew_amount' => 1050, 'tld' => 'us'],
			['registration_amount' => 1050, 'renew_amount' => 1050, 'tld' => 'рус'],
			['registration_amount' => 1180, 'renew_amount' => 1180, 'tld' => 'top'],
			['registration_amount' => 1180, 'renew_amount' => 1180, 'tld' => 'xyz'],
			['registration_amount' => 1580, 'renew_amount' => 1580, 'tld' => 'club'],
			['registration_amount' => 1580, 'renew_amount' => 1580, 'tld' => 'mobi'],
			['registration_amount' => 1890, 'renew_amount' => 1890, 'tld' => 'in'],
			['registration_amount' => 1890, 'renew_amount' => 1890, 'tld' => 'kz'],
			['registration_amount' => 1890, 'renew_amount' => 1890, 'tld' => 'pro'],
			['registration_amount' => 1980, 'renew_amount' => 1980, 'tld' => 'me'],
			['registration_amount' => 2180, 'renew_amount' => 2180, 'tld' => 'center'],
			['registration_amount' => 3050, 'renew_amount' => 3050, 'tld' => 'cc'],
			['registration_amount' => 3050, 'renew_amount' => 3050, 'tld' => 'guru'],
			['registration_amount' => 3050, 'renew_amount' => 3050, 'tld' => 'online'],
			['registration_amount' => 3050, 'renew_amount' => 3050, 'tld' => 'site'],
			['registration_amount' => 3050, 'renew_amount' => 3050, 'tld' => 'tv']
		];
	}

	private function preparedData()
	{
		$result = $this->getData();

		foreach ($result as $key => $value) {
			$result[$key]['tld_ascii'] = idn_to_ascii($value['tld'], 0, INTL_IDNA_VARIANT_UTS46);
		}

		return $result;
	}

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table($this->table)->insert($this->preparedData());
    }
}
