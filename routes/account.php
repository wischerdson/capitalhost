<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'HomeController@index')->name('home');
Route::get('mail', 'PlugController@index')->name('mail.index');
Route::get('finance', 'PlugController@index')->name('finance.index');
Route::get('support', 'PlugController@index')->name('support.index');
Route::get('profile', 'PlugController@index')->name('profile.edit');


Route::prefix('settings')->name('settings.')->group(function () {
	Route::get('/', 'SettingsController@index')->name('index');
	Route::any('select-plan/{plan}', 'SettingsController@selectPlan')->name('select-plan');
});


Route::prefix('payment')->name('payment.')->middleware('rate_plan')->group(function () {
	Route::get('/', 'PaymentController@index')->name('index');
	Route::post('create', 'PaymentController@create')->name('create');
	Route::get('success', 'PaymentController@success')->name('success');
	Route::get('fail', 'PaymentController@fail')->name('fail');
});


Route::prefix('ssl')->name('ssl.')->group(function () {
	Route::get('/', 'SSLController@index')->name('index');
	Route::post('buy', 'SSLController@buy')->name('buy');
});


Route::prefix('domains')->name('domains.')->group(function () {
	Route::get('/', 'DomainsController@index')->name('index');
	Route::any('check', 'DomainsController@check')->name('check');
	Route::post('buy', 'DomainsController@buy')->name('buy');
});


Route::prefix('persons')->name('persons.')->group(function () {
	Route::post('create', 'PersonsController@create')->name('create');
});