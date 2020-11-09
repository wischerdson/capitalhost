<?php

namespace App\Notifications\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use App\Channels\Vk\ManagementChannel as VkManagementChannel;

class ReleaseTask extends Notification
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
		$notifiable->loadMissing('user');
		$notifiable->loadMissing('user.domains');

		$userFirstDomain = $notifiable->user->domains->isEmpty() ? '-' : $notifiable->user->domains[0]->name;

		return "
			Уведомление по задаче:

			Этап $notifiable->step
			$notifiable->name
			".($notifiable->description ?? 'Описание отсутствует')."

			ФИ: ".$notifiable->user->last_name." ".$notifiable->user->first_name."
			Компания: ".$notifiable->user->company."
			Email: ".$notifiable->user->email."
			Сайт: $userFirstDomain
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
