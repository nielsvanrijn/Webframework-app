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

Auth::routes();

// index
Route::get('/', 'MovieController@index');

// movies sort
Route::post('/sort_default', 'MovieController@sort_default');
Route::post('/sort_title', 'MovieController@sort_title');
Route::post('/sort_year', 'MovieController@sort_year');

Route::get('/home', 'HomeController@index');

// profile
Route::get('/profile', 'UserController@profile');
Route::post('/profile', 'UserController@update_avatar');
