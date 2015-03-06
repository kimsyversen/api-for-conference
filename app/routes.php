<?php

/**
 * This resource exists purely for testing purposes.
 * The resource, and its controller counterpart can
 * safely be removed from the project.
 */
Route::resource('testing', 'DevelopmentTestingController');

Route::post('oauth/access_token', 'OAuthController@postAccessToken');
Route::post('register', ['as' => 'register_path',  'uses' => 'RegistrationController@store' ]);
Route::get('register', [ 'as' => 'register_path', 'uses' => 'RegistrationController@create' ]);
Route::get('register/verify/{confirmation_code}', [ 'as' => 'confirmation_path',  'uses' => 'RegistrationController@verify' ]);

foreach (File::allFiles(__DIR__.'/routes') as $partial)
{
    if ($partial->getRelativePath() != '')
    {
        Route::group(['prefix'=>$partial->getRelativePath()], function() use ($partial) {
            require $partial->getPathname();
        });
    }
    else
    {
        require $partial->getPathname();
    }
}