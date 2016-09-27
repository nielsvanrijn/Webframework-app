<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'MovieController@movie');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('profile', 'UserController@profile');
Route::post('profile', 'UserController@update_avatar');
