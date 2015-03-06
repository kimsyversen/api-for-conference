<?php

/**
 * Instead of sending the numeric conference id to
 * the controllers, find and send a eloquent
 * conference object with an id = 'conferences'
 */
//Route::model('conferences', 'Uninett\Eloquent\Conferences\Conference');

//Route::bind('conferences', function($value, $route)
//{
//    if(is_numeric($value)) return $value;
//    return explode(',', $value);
//});

Route::get('conferences', [
    'as' => 'api.v1.conferences.index',
    'uses' => 'ConferencesController@index'
]);
//Route::get('conferences/create', [
//    'as' => 'api.v1.conferences.create',
//    'uses' => 'ConferencesController@create'
//]);
//Route::post('conferences', [
//    'as' => 'api.v1.conferences.store',
//    'uses' => 'ConferencesController@store'
//]);
Route::get('conferences/{conferences}', [
    'as' => 'api.v1.conferences.show',
    'uses' => 'ConferencesController@show'
]);
//Route::get('conferences/{conferences}/edit', [
//    'as' => 'api.v1.conferences.edit',
//    'uses' => 'ConferencesController@edit'
//]);
//Route::put('conferences/{conferences}', [
//    'as' => 'api.v1.conferences.update',
//    'uses' => 'ConferencesController@update'
//]);
//Route::patch('conferences/{conferences}', [
//    'as' => '',
//    'uses' => 'ConferencesController@update'
//]);
//Route::delete('conferences/{conferences}', [
//    'as' => 'api.v1.conferences.destroy',
//    'uses' => 'ConferencesController@destroy'
//]);

Route::bind('sessions', function($value, $route)
{
    return explode(',', $value);
});

Route::get('conferences/{conferences}/sessions/{sessions}', [
    'as' => 'api.v1.conferences.conferences.sessions.show',
    'uses' => 'ConferenceSessionsController@show'
]);