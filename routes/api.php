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
Route::get('mail', function () {
    $foyer = App\Models\Foyers\Foyer::find(3);
    $user = \App\User::find(1);
    event(new \App\Events\FoyerWasCreated($foyer));
    $service = new \App\Services\FoyerService();
    $service->addUser($user,$foyer);
    event(new \App\Events\FoyerUserDelete($foyer));
});

Route::group(['middleware' => 'auth:api'], function () {
    // Users
    Route::get('users', 'UsersAPIController@index');
    Route::get('users/{user}', 'UsersAPIController@show');
    Route::match(['put', 'patch'], 'users', 'UsersAPIController@update');

    // Foyer
    Route::get('foyer', 'Foyers\FoyerAPIController@index');
    Route::get('foyer/{foyer}', 'Foyers\FoyerAPIController@show');
    Route::delete('foyer/{foyer}', 'Foyers\FoyerAPIController@remove');
    Route::post('foyer', 'Foyers\FoyerAPIController@store');
    Route::match(['put', 'patch'], 'foyer/{foyer}', 'Foyers\FoyerAPIController@update');

    // FoyerUser
    Route::post('foyer/join', 'Foyers\FoyerUserAPIController@store');
    Route::delete('foyer/{foyer}/exclude/{user}', 'Foyers\FoyerUserAPIController@exclude');

    // Housework
    Route::get('houseworks', 'HouseworkController@index');
    Route::get('houseworks/{housework}', 'HouseworkController@show');

    // Prefs
    Route::get('prefs', 'PrefController@index');
    Route::get('prefs/{housework}', 'PrefController@show');
    Route::get('prefs/user/{user}', 'PrefController@showAllForUser');
    Route::put('prefs/{housework}', 'PrefController@update');
});

// Add User
Route::post('users', 'UsersAPIController@store');

