<?php

namespace App\Observers;

use Illuminate\Support\Facades\Mail;

use App\Domain;
use App\User;
use App\Mail\NewDomain;

class DomainObserver
{
	/**
	 * Handle the domain "created" event.
	 *
	 * @param  \App\Domain  $domain
	 * @return void
	 */
	public function created(Domain $domain)
	{
		
	}

	/**
	 * Handle the domain "updated" event.
	 *
	 * @param  \App\Domain  $domain
	 * @return void
	 */
	public function updated(Domain $domain)
	{
		//
	}

	/**
	 * Handle the domain "deleted" event.
	 *
	 * @param  \App\Domain  $domain
	 * @return void
	 */
	public function deleted(Domain $domain)
	{
		//
	}

	/**
	 * Handle the domain "restored" event.
	 *
	 * @param  \App\Domain  $domain
	 * @return void
	 */
	public function restored(Domain $domain)
	{
		//
	}

	/**
	 * Handle the domain "force deleted" event.
	 *
	 * @param  \App\Domain  $domain
	 * @return void
	 */
	public function forceDeleted(Domain $domain)
	{
		//
	}
}
