<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use View;
use App\User;
use App\Domain;
use App\Observers\DomainObserver;
use App\Observers\UserObserver;

class AppServiceProvider extends ServiceProvider
{
	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		\DB::listen(function($query) {
			// dump($query->sql);
		});

		Domain::observe(DomainObserver::class);
		User::observe(UserObserver::class);
		
		View::addExtension('svg', 'file');
	}
}
