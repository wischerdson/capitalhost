<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'HomeController@index')->name('home');

Route::prefix('legal')->name('legal.')->group(function () {
	Route::get('/', 'LegalController@index')->name('index');
	Route::get('privacy-policy', 'LegalController@privacyPolicy')->name('privacy-policy');
	Route::get('terms', 'LegalController@terms')->name('terms');
});

Route::namespace('Auth')->name('auth.')->prefix('auth')->group(function () {
	Route::get('sign-up', 'SignUpController@index')->name('sign-up.index');
	Route::post('sign-up', 'SignUpController@store')->name('sign-up.store');

	Route::prefix('password-recovery')->name('password-recovery.')->group(function () {
		Route::get('/', 'PasswordRecoveryController@index')->name('index');
		Route::post('recovery-request', 'PasswordRecoveryController@checkEmail')->name('recovery-request');

		Route::middleware('password.recovery')->group(function () {
			Route::get('password-change', 'PasswordRecoveryController@showPasswordChangeForm')->name('password-change.index');
			Route::post('password-change', 'PasswordRecoveryController@passwordChange')->name('password-change');
		});
	});
});
