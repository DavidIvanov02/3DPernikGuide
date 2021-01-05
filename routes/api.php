<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Authentication Routes
Route::group(['namespace' => 'Api'], function () {
    Route::post('/register', 'AuthController@register');
    Route::post('/login', 'AuthController@login');

    Route::middleware('verifyapitoken')->group(function () {
       Route::post('user/update', 'UserController@update');
    });
});

// Fortress Routes
Route::group(['prefix' => '/data/fortress/', 'namespace' => 'Api'], function () {
    Route::get('users', 'FortressUsersController@index');
    Route::get('users/weekly', 'FortressController@index');

    Route::middleware('verifyapitoken')->group(function () {
        Route::get('user', 'FortressUsersController@show');
        Route::match(['PUT', 'PATCH'], 'user/update', 'FortressUsersController@update');
    });
});

// Museum Routes
Route::group(['prefix' => '/data/museum/', 'namespace' => 'Api'], function () {
    Route::get('users', 'MuseumUsersController@index');
    Route::get('users/weekly', 'MuseumController@index');

    Route::middleware('verifyapitoken')->group(function () {
        Route::get('user', 'MuseumUsersController@show');
        Route::match(['PUT', 'PATCH'], 'user/update', 'MuseumUsersController@update');
    });
});

// Finds Routes
Route::group(['prefix' => 'user', 'namespace' => 'Api'], function() {
    Route::middleware('verifyapitoken')->group(function () {
        Route::get('finds', 'FindsUserController@index');
        Route::match(['PUT', 'PATCH'], 'finds/update', 'FindsUserController@update');
    });
});
