<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SiteFreezeNotification extends Mailable
{
	use Queueable, SerializesModels;

	private $params = [];

	/**
	 * Create a new message instance.
	 *
	 * @return void
	 */
	public function __construct($data)
	{
		$this->params = $data;
	}

	/**
	 * Build the message.
	 *
	 * @return $this
	 */
	public function build()
	{
		return $this->
			from('noreply@capitalup.ru', 'CapitalHost')->
			subject('Уведомление о заморозке сайта '.$this->params['user']->company)->
			markdown('emails.site-freeze-notification-'.$this->params['remained'])->
			with($this->params);
	}
}
