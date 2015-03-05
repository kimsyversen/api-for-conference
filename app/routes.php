<?php

Route::resource('group', 'GroupsController');

Route::post('oauth/access_token', 'OAuthController@postAccessToken');

Route::post('register', ['as' => 'register_path',  'uses' => 'RegistrationController@store' ]);
Route::get('register', [ 'as' => 'register_path', 'uses' => 'RegistrationController@create' ]);
Route::get('register/verify/{confirmation_code}', [ 'as' => 'confirmation_path',  'uses' => 'RegistrationController@verify' ]);

Route::group(['prefix' => 'api'], function() {
	Route::group(['prefix' => 'v1', ], function() {

		Route::group(['prefix' => 'conferences',  ], function() {
			Route::get('/', [ 'as' => 'conferences_path', 'uses' => 'ConferencesController@index' ]);



			Route::group(['prefix' => '{id}',  ], function() {
				Route::get('/', [ 'as' => 'conferences_path', 'uses' => 'ConferencesController@getConferenceById' ]);

				Route::get('schedueles', [ 'as' => 'schedueles_path', 'uses' => 'ConferenceScheduelesController@index' ]);


			});


		});


		Route::group(['prefix' => '/', 'before' => 'oauth'  ], function() {
			Route::get('users/me', [ 'as' => 'users_path', 'uses' => 'UsersController@getMe' ]);
			Route::get('users/{id}', [ 'as' => 'users_path', 'uses' => 'UsersController@getUserById' ]);
		});




	});
});

