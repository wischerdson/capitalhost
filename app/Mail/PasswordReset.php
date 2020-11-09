<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PasswordReset extends Mailable
{
	use Queueable, SerializesModels;

	public $params = [];

	/**
	 * Create a new message instance.
	 *
	 * @return void
	 */
	public function __construct($params)
	{
		$this->params = $params;
	}

	/**
	 * Build the message.
	 *
	 * @return $this
	 */
	public function build()
	{
		return $this->
			from('noreply@capitalup.ru', 'CapitalUp.')->
			subject('Сброс пароля')->
			markdown('emails.password-reset')->
			with($this->params);
	}
}
