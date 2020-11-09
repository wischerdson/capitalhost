<?php

namespace App\Notifications\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use App\Channels\Vk\TransactionsChannel as VkTransactionsChannel;

class BalanceIncreased extends Notification
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
		return [VkTransactionsChannel::class];
	}

	/**
	 * Get the string representation of the notification.
	 *
	 * @param  mixed  $notifiable
	 * @return string
	 */
	public function toVk($notifiable)
	{
		$notifiable->loadMissing('domains');

		$userFirstDomain = $notifiable->domains->isEmpty() ? '-' : $notifiable->domains[0]->name;

		return "
			Клиент пополнил баланс:
			
			ФИ: $notifiable->last_name $notifiable->first_name
			Компания: $notifiable->company
			Email: $notifiable->email
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
