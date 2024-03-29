<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'HomeController@index');

Route::prefix('tasks')->name('tasks.')->group(function () {
	Route::post('create', 'TasksController@create')->name('create');
	Route::post('update', 'TasksController@update')->name('update');
	Route::post('delete', 'TasksController@delete')->name('delete');
});

Route::prefix('users')->name('users.')->group(function () {
	Route::post('get', 'UsersController@get')->name('get');
});