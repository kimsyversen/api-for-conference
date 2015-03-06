<?php

// If we are going to use this, fix the folder problem i.e. conferences{conferences} => conferences/{conferences}
//foreach (File::allFiles(__DIR__.'/routes') as $partial)
//{
//    if ($partial->getRelativePath() != '')
//    {
//        Route::group(['prefix'=>$partial->getRelativePath()], function() use ($partial) {
//            require_once $partial->getPathname();
//        });
//    }
//    else
//    {
//        require_once $partial->getPathname();
//    }
//}

/**
 * This resource exists purely for testing purposes.
 * The resource, and its controller counterpart can
 * safely be removed from the project.
 */
//Route::resource('testing', 'DevelopmentTestingController', [
//    //'only' => ['index'],
//]);

/**
 * Apply the CSRF filter for every route with
 * post, put, or patch verbs.
 */
//Route::when('*', 'csrf', ['post', 'put', 'patch']);

Route::post('oauth/access_token', 'OAuthController@postAccessToken');
Route::post('register', ['as' => 'register_path',  'uses' => 'RegistrationController@store' ]);
Route::get('register', [ 'as' => 'register_path', 'uses' => 'RegistrationController@create' ]);
Route::get('register/verify/{confirmation_code}', [ 'as' => 'confirmation_path',  'uses' => 'RegistrationController@verify' ]);


/**
 * api/v1/
 */
Route::group(['prefix' => 'api/v1'], function() {

    Route::get('users/me', [ 'as' => 'users_path', 'uses' => 'UsersController@getMe', 'before' => 'oauth']);
    Route::get('users/{id}', [ 'as' => 'users_path', 'uses' => 'UsersController@getUserById', 'before' => 'oauth']);

    Route::get('conferences',                           ['as' => 'api.v1.conferences.index',  'uses' => 'ConferencesController@index']);
//    Route::get('conferences/{$id}',                     ['as' => 'api.v1.conferences.index',  'uses' => 'ConferencesController@index']);
//    Route::get('conferences/{$id}/sessions',            ['as' => 'api.v1.conferences.index',  'uses' => 'ConferencesController@index']);
//    Route::get('conferences/{$id}/sessions/{$id2}',     ['as' => 'api.v1.conferences.index',  'uses' => 'ConferencesController@index']);
//    Route::get('conferences/{$id}/agendas',             ['as' => 'api.v1.conferences.index',  'uses' => 'ConferencesController@index']);

});



//Route::post('conferences', [ 'as' => 'api.v1.conferences.store',  'uses' => 'ConferencesController@store']);
//Route::put('conferences', [ 'as' => 'api.v1.conferences.update',  'uses' => 'ConferencesController@update']);
//Route::delete('conferences', [ 'as' => 'api.v1.conferences.destroy',  'uses' => 'ConferencesController@destroy']);


