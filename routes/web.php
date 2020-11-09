<?php


Route::post('auth/sign-in', 'Guest\Auth\SignInController@authenticate')->name('guest.auth.sign-in');
Route::get('auth/logout', 'Guest\Auth\LogoutController@index')->name('guest.auth.logout');
Route::any('payment/report', 'Account\PaymentController@report');


Route::get('decrypt', function (\Illuminate\Http\Request $request) {
	$p = $request->input('p');
	return decrypt($p);
});



// Route::name('main.')->namespace('Guest')->group(function () {
// 	Route::get('/', ['uses' => 'HomeController@index', 'as' => 'home']);
// 	Route::get('vacancies', 'HomeController@vacancies')->name('vacancies');

// 	Route::prefix('legal')->name('legal.')->group(function () {
// 		Route::get('/', 'LegalController@index')->name('index');
// 	});

// 	Route::get('sign-in', ['uses' => 'AuthController@signInForm', 'as' => 'sign-in']);
// 	Route::get('sign-up', ['uses' => 'AuthController@signUpForm', 'as' => 'sign-up']);
// 	Route::get('privacy-policy', ['uses' => 'LegalController@privacyPolicy', 'as' => 'privacy-policy']);
// 	Route::get('terms', ['uses' => 'LegalController@terms', 'as' => 'terms']);
// 	Route::get('password-recovery', 'AuthController@passwordRecovery')->name('password-recovery');
// 	Route::post('password-recovery', 'AuthController@sendResetPasswordMail')->name('password-recovery.send-mail');

// 	Route::post('sign-in', ['uses' => 'AuthController@signIn', 'as' => 'sign-in-post']);
// 	Route::post('sign-up', ['uses' => 'AuthController@signUp', 'as' => 'sign-up-post']);
// 	Route::get('recovery/{account_number}/{token}', 'AuthController@showChangePasswordForm')->name('recovery');
// 	Route::post('recovery/{account_number}/{token}', 'AuthController@changePassword')->name('recovery.post');
// });


// Route::group([
// 	'prefix' => 'dashboard',
// 	'namespace' => 'Dashboard',
// 	'middleware' => ['web', 'auth']
// ], function () {
// 	Route::get('/', ['as' => 'dashboard', 'uses' => 'HomeController@index']);
// 	Route::get('select-plan/{plan}', ['as' => 'dashboard.settings.changePlan', 'uses' => 'SettingsController@changePlan']);
// 	// Route::get('logout', ['as' => 'dashboard.logout', 'uses' => 'HomeController@logout']);

// 	Route::group([
// 		'middleware' => 'rate_plan'
// 	], function () {
// 		Route::group(['prefix' => 'pay'], function () {
// 			Route::get('/', ['as' => 'dashboard.pay.index', 'uses' => 'PaymentController@index']);
// 			Route::post('register', ['as' => 'dashboard.pay.store', 'uses' => 'PaymentController@register']);
// 			Route::get('success', ['as' => 'dashboard.pay.success', 'uses' => 'PaymentController@success']);
// 		});

// 		Route::group(['prefix' => 'domains'], function () {
// 			Route::get('/', ['as' => 'dashboard.domains.index', 'uses' => 'DomainsController@index']);
// 			Route::any('available', ['as' => 'dashboard.domains.available', 'uses' => 'DomainsController@available']);
// 			Route::post('buy', ['as' => 'dashboard.domains.buy', 'uses' => 'DomainsController@buy']);
// 		});

// 		Route::group(['prefix' => 'analytics'], function () {
// 			Route::get('/', ['as' => 'dashboard.analytics.index', 'uses' => 'AnalyticsController@index']);
// 			Route::get('oauth-result', ['as' => 'dashboard.domains.oauthResult', 'uses' => 'AnalyticsController@oauthResult']);
// 		});
// 	});

// 	Route::group(['prefix' => 'settings'], function () {
// 		Route::get('/', ['as' => 'dashboard.settings.index', 'uses' => 'SettingsController@edit']);

// 		Route::group(['prefix' => 'yandex'], function () {
// 			Route::get('/', ['as' => 'dashboard.settings.yandex', 'uses' => 'SettingsController@yandex']);
// 			Route::get('callback', 'SettingsController@handleProviderCallback')->name('dashboard.settings.yandex.callback');
// 		});

// 		Route::post('/contact-details/store', 'SettingsController@storeContactDetails')->name('dashboard.settings.contact-details.store');
// 	});

// 	Route::get('/orders', ['as' => 'dashboard.orders.index', 'uses' => 'PlugController@index']);
// 	Route::get('/ad', ['as' => 'dashboard.ad.index', 'uses' => 'PlugController@index']);
// 	Route::get('/mail', ['as' => 'dashboard.mail.index', 'uses' => 'PlugController@index']);
// 	Route::get('/sms', ['as' => 'dashboard.sms.index', 'uses' => 'PlugController@index']);
// 	Route::get('/finance', ['as' => 'dashboard.finance.index', 'uses' => 'PlugController@index']);
// 	Route::get('ssl', 'SSLController@index')->name('dashboard.ssl.index');
// 	Route::post('ssl/buy', 'SSLController@buy')->name('dashboard.ssl.buy');
	
// 	Route::get('/support', ['as' => 'dashboard.support.index', 'uses' => 'PlugController@index']);
// 	Route::get('/profile', ['as' => 'dashboard.profile.edit', 'uses' => 'ProfileController@edit']);
// });

