<?php

use Illuminate\Http\Request;

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

Route::group(['middleware' => 'auth:api'], function () {

    // Users
    Route::get('users', 'UsersAPIController@index');
    Route::get('users/{id}', 'UsersAPIController@show')->where('id', '[0-9]+');
    Route::match(['put', 'patch'], 'users', 'UsersAPIController@update');

});

// Add User
Route::post('users', 'UsersAPIController@store');