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

Route::get('/', 'MovieController@movie');

Route::get('home', 'HomeController@index');

Route::get('profile', 'UserController@profile');
Route::post('profile', 'UserController@update_avatar');

Route::post('home/help-centre/category/{category_id}/section/{section_id}/article/sort-order');
