<?php


Route::get('/', function() { return View::make('hello'); });
Route::post('oauth/access_token', 'OAuthController@postAccessToken');


Route::post('register', ['as' => 'register_path',  'uses' => 'RegistrationController@store' ]);
Route::get('register', [ 'as' => 'register_path', 'uses' => 'RegistrationController@create' ]);
Route::get('register/verify/{confirmation_code}', [ 'as' => 'confirmation_path',  'uses' => 'RegistrationController@verify' ]);


Route::get('test', 'UsersController@asdf');

Route::group(['prefix' => 'api'], function() {
	Route::group(['prefix' => 'v1', 'before' => 'oauth' ], function() {

		Route::get('users/me', [ 'as' => 'users_path', 'uses' => 'UsersController@getMe' ]);
		Route::get('users/{id}', [ 'as' => 'users_path', 'uses' => 'UsersController@getUserById' ]);

	});
});