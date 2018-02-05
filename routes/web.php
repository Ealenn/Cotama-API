<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');

Route::get('/game', 'HomeController@front')->middleware('auth');
Route::get('/game/{vue?}', 'HomeController@front')->middleware('auth');

Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
