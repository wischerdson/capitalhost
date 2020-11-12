<?php

Route::post('auth/sign-in', 'Guest\Auth\SignInController@authenticate')->name('guest.auth.sign-in');
Route::get('auth/logout', 'Guest\Auth\LogoutController@index')->name('guest.auth.logout');
Route::any('payment/report', 'Account\PaymentController@report');
