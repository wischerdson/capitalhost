<?php

use Illuminate\Http\Request;

Route::get('site-availability/{account_number}', 'API\AvailabilityController@available');
ROute::any('tilda-repeater', 'API\TildaController@notifyByEmail');
ROute::any('tilda/formdata', 'API\TildaController@notifyByEmail');