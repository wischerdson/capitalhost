<?php

namespace App\Services\RegRu;

use Illuminate\Support\Facades\Http;

class RegRu
{
	private $baseUrl = 'https://api.reg.ru/api/regru2/';
	public $method;
	public $category;
	public $params;

	private function auth()
	{
		return '?username='.env('REGRU_USERNAME').'&password='.env('REGRU_PASSWORD');
	}

	public function getUrl()
	{
		$this->params['input_format'] = 'json';

		$url = $this->baseUrl.$this->category.'/'.$this->method.$this->auth();

		foreach ($this->params as $key => $value) {
			$url .= '&'.$key.'='.$value;
		}

		return $url;
	}

	public function send()
	{
		$response = Http::post($this->getUrl());
		return $response;
		return $response->json()['answer'];
	}
}