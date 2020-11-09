<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TildaFormdata extends Mailable
{
	use Queueable, SerializesModels;

	/**
	 * Create a new message instance.
	 *
	 * @return void
	 */

	private $user;
	private $formdata;
	private $payment;

	public function __construct($user, $formdata, $payment = [])
	{
		$this->user = $user;
		$this->formdata = $formdata;
		$this->payment = $payment;
	}

	/**
	 * Build the message.
	 *
	 * @return $this
	 */
	public function build()
	{
		return $this->
			from('noreply@capitalup.ru', $this->user->description->company_name)->
			subject('Заполнена форма')->
			markdown('emails.tilda-formdata')->
			with(['user' => $this->user, 'formdata' => $this->formdata, 'payment' => $this->payment]);
	}
}
