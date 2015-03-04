<?php
use League\OAuth2\Server\AuthorizationServer;

Event::listen('Illuminate.Support.Facades.Response', function($param)
{
	dd('asdf');
});

Route::resource('group', 'GroupsController');
Route::get('map', 'MapsController@index');

Route::get('/', function() { return View::make('hello'); });


Route::post('oauth/access_token', 'OAuthController@postAccessToken');


Route::post('register', ['as' => 'register_path',  'uses' => 'RegistrationController@store' ]);
Route::get('register', [ 'as' => 'register_path', 'uses' => 'RegistrationController@create' ]);
Route::get('register/verify/{confirmation_code}', [ 'as' => 'confirmation_path',  'uses' => 'RegistrationController@verify' ]);


Route::get('test', 'UsersController@asdf');

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


		Route::group(['prefix' => 'conference/{id}', 'before' => 'oauth' ], function() {

			Route::get('/admin',  [ 'as' => 'admin_path', 'uses' => 'AdminController@index' ]);

		});

	});
});

