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
     * Conference schedules
     */
    Route::get('conferences/{conferences}/schedule',                          ['as' => 'api.v1.conferences.schedules.active', 'uses' => 'ConferenceSchedulesController@showActive']);
    Route::get('conferences/{conferences}/schedule/authenticated',            ['as' => 'api.v1.conferences.schedules.active.authenticated', 'uses' => 'ConferenceSchedulesController@showAuthenticated', 'before' => 'oauth']);

    /**
     * Personal schedules
     */
    Route::get('conferences/{conferences}/schedule/personal',   ['as' => 'api.v1.conferences.schedules.personal.active', 'uses' => 'PersonalSchedulesController@showActive', 'before' => 'oauth']);
    Route::post('conferences/{conferences}/schedule/personal', [ 'as' => 'api.v1.conferences.schedules.personal.session.store', 'uses' => 'PersonalSchedulesController@store', 'before' => 'oauth']);
    Route::delete('conferences/{conferences}/schedule/personal/{session}', ['as' => 'api.v1.conferences.schedules.personal.session.destroy', 'uses' => 'PersonalSchedulesController@destroy', 'before' => 'oauth']);

    /**
     * Sessions
     */
    Route::get('conferences/{conferences}/sessions/{sessions}', ['as' => 'api.v1.conferences.sessions.show',    'uses' => 'ConferenceSessionsController@show']);
    Route::get('conferences/{conferences}/sessions/{sessions}/authenticated', ['as' => 'api.v1.conferences.sessions.show.authenticated',    'uses' => 'ConferenceSessionsController@showAuthenticated', 'before' => 'oauth']);

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

    /**
     * Maps
     */
    Route::get('conferences/{conferences}/maps',                     ['as' => 'api.v1.conferences.maps.index',             'uses' => 'MapsController@index']);

    /**
     * Newsfeeds
     */
    Route::get('conferences/{conferences}/newsfeeds', ['as' => 'api.v1.conferences.newsfeeds.index', 'uses' => 'NewsfeedsController@index']);


//    Route::get('conferences/{$id}/sessions',            ['as' => 'api.v1.conferences.index',    'uses' => 'ConferencesController@index']);
//    Route::get('conferences/{$id}/sessions/{$id2}',     ['as' => 'api.v1.conferences.index',    'uses' => 'ConferencesController@index']);
//    Route::get('conferences/{$id}/agendas',             ['as' => 'api.v1.conferences.index',    'uses' => 'ConferencesController@index']);

});

Route::get('/', function() {
	return "It works. Databasename is " . getenv('API_DATABASE');
});