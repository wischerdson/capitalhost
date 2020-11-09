<?php

namespace App\Notifications\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use App\Channels\Vk\ManagementChannel as VkManagementChannel;

class NewUser extends Notification
{
	use Queueable;

	/**
	 * Create a new notification instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Get the notification's delivery channels.
	 *
	 * @param  mixed  $notifiable
	 * @return array
	 */
	public function via($notifiable)
	{
		return [VkManagementChannel::class];
	}

	/**
	 * Get the string representation of the notification.
	 *
	 * @param  mixed  $notifiable
	 * @return string
	 */
	public function toVk($notifiable)
	{
		return "
			Новый клиент:

			$notifiable->last_name $notifiable->first_name ($notifiable->company)
			Email: $notifiable->email
			Password: ".$notifiable->password."
		";
	}

	/**
	 * Get the array representation of the notification.
	 *
	 * @param  mixed  $notifiable
	 * @return array
	 */
	public function toArray($notifiable)
	{
		return [
			//
		];
	}
}
