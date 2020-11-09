<?php

namespace App\Channels\Vk;

use Illuminate\Notifications\Notification;
use App\Services\VKBotSendMessage;

class VkChannel
{
	/**
	 * Send the given notification.
	 *
	 * @param  mixed  $notifiable
	 * @param  \Illuminate\Notifications\Notification  $notification
	 * @return void
	 */
	public function send($notifiable, Notification $notification)
	{
		$message = $notification->toVk($notifiable);

		if (env('APP_DEBUG'))
			return;

		$vk = new VKBotSendMessage($message);
		$vk->setCommunity($this->communityId);
		$vk->setToken($this->accessToken);
		$vk->sendAllMembers();
	}
}