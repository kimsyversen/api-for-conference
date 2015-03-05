<?php

Route::get('users/me', [ 'as' => 'users_path', 'uses' => 'UsersController@getMe', 'before' => 'oauth']);
Route::get('users/{id}', [ 'as' => 'users_path', 'uses' => 'UsersController@getUserById', 'before' => 'oauth']);
