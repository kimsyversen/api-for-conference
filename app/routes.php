<?php

Route::post('oauth/access_token', 'OAuthController@postAccessToken');

Route::get('register/verify/{confirmation_code}', [ 'as' => 'confirmation_path',  'uses' => 'RegistrationController@verify' ]);

Route::post('register', [
	'as' => 'register_path',
	'uses' => 'RegistrationController@store'
]);

Route::get('register', [
	'as' => 'register_path',
	'uses' => 'RegistrationController@create'
]);

Route::group(['prefix' => 'api'], function() {
	Route::group(['prefix' => 'v1'], function() {

		Route::post('oauth/access_token', 'OAuthController@postAccessToken');


		Route::get('test', function()
		{
			$data = [
				'status' => 'Api is up and running!!'
			];

			return Response::json($data, 200, []);
		});

	});
});