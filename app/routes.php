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
//    Route::get('users/{id}', [ 'as' => 'users_path', 'uses' => 'UsersController@getUserById', 'before' => 'oauth']);

    /**
     * Conferences
     */
    Route::get('conferences',                                   ['as' => 'api.v1.conferences.index',            'uses' => 'ConferencesController@index']);
    Route::get('conferences/{conferences}',                     ['as' => 'api.v1.conferences.show',             'uses' => 'ConferencesController@show']);

    /**
     * Schedules
     */
    Route::get('conferences/{conferences}/schedule',            ['as' => 'api.v1.conferences.schedules.active', 'uses' => 'ConferenceSchedulesController@showActive']);

    /**
     * Sessions
     */
    Route::get('conferences/{conferences}/sessions/{sessions}', ['as' => 'api.v1.conferences.sessions.show',    'uses' => 'ConferenceSessionsController@show']);

    /**
     * Ratings
     */
    Route::get('conferences/{conferences}/sessions/{sessions}/ratings/create', ['as' => 'api.v1.conferences.sessions.ratings.create', 'uses' => 'ConferenceSessionRatingsController@create', 'before' => 'oauth']);
    Route::post('conferences/{conferences}/sessions/{sessions}/ratings', [ 'as' => 'api.v1.conferences.sessions.ratings.store', 'uses' => 'ConferenceSessionRatingsController@store', 'before' => 'oauth']);

    /**
     * Questions
     */
    Route::get('conferences/{conferences}/sessions/{sessions}/questions/create', ['as' => 'api.v1.conferences.sessions.questions.create', 'uses' => 'ConferenceSessionQuestionsController@create', 'before' => 'oauth']);
    Route::post('conferences/{conferences}/sessions/{sessions}/questions', [ 'as' => 'api.v1.conferences.sessions.questions.store', 'uses' => 'ConferenceSessionQuestionsController@store', 'before' => 'oauth']);


//    Route::get('conferences/{$id}/sessions',            ['as' => 'api.v1.conferences.index',    'uses' => 'ConferencesController@index']);
//    Route::get('conferences/{$id}/sessions/{$id2}',     ['as' => 'api.v1.conferences.index',    'uses' => 'ConferencesController@index']);
//    Route::get('conferences/{$id}/agendas',             ['as' => 'api.v1.conferences.index',    'uses' => 'ConferencesController@index']);

});


