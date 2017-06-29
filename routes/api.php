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
    Route::get('users/{user}', 'UsersAPIController@show')->where('user', '[0-9]+');
    Route::match(['put', 'patch'], 'users', 'UsersAPIController@update');

    // Foyer
    Route::get('foyer', 'Foyers\FoyerAPIController@index');
    Route::get('foyer/{foyer}', 'Foyers\FoyerAPIController@show')->where('foyer', '[0-9]+');
    Route::post('foyer', 'Foyers\FoyerAPIController@store');
    Route::match(['put', 'patch'], 'foyer/{foyer}', 'Foyers\FoyerAPIController@update');

    // FoyerUser
    Route::post('foyer/join', 'Foyers\FoyerUserAPIController@store');
});

// Add User
Route::post('users', 'UsersAPIController@store');

