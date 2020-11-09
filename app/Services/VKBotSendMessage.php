<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class VKBotSendMessage
{
	const VK_API_ENDPOINT = 'https://api.vk.com/method/';
	
	const VK_API_VERSION = '5.67';

	private $accessToken = null;

	private $communityId = null;

	private $message = '';

	public function __construct($message)
	{
		$this->message = $message;
		$this->setCommunity(198988107);
	}

	public function setCommunity($communityId)
	{
		$this->communityId = $communityId;
	}

	public function setToken($accessToken)
	{
		$this->accessToken = $accessToken;
	}

	public function send(array $members)
	{
		$this->apiCall('messages.send', [
			'user_ids' => implode(',', $members),
			'message' => $this->message
		]);

		return true;
	}

	public function sendAllMembers()
	{
		$members = $this->getMembers();

		return $this->send($members);
	}

	private function getMembers()
	{
		$response = $this->apiCall('groups.getMembers', ['group_id' => $this->communityId]);
		$members = $response['response']['items'];
		return $members;
	}

	private function apiCall($method, $params = [])
	{
		$params['access_token'] = $this->accessToken;
		$params['v'] = self::VK_API_VERSION;

		$url = self::VK_API_ENDPOINT.$method.'?'.http_build_query($params);

		$response = Http::get($url);

		return $response->json();
	}
}