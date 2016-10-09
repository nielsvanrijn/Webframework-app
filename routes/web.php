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

// home
Route::get('/', 'MovieController@index');

// movies sort ajax only
Route::group(['middleware' => ['ajax']], function(){
    Route::get('/sort/default', 'MovieController@sort_default');
});
Route::get('/sort/{what}/{how}/{genre_id}', 'MovieController@sort');

//LOGIN REQUIRED
Route::group(['middleware' => ['auth']], function(){

    // dasboard
    Route::get('/dashboard', 'DashboardController@dash');

    // profile
    Route::get('/profile', 'UserController@profile');
    Route::post('/profile', 'UserController@update_avatar');

    //add a movie
    Route::get('/addmovie', 'MovieController@moviecreate');
    Route::post('/addmovie', 'MovieController@moviestore');
});

//MODERATOR REQUIRED
Route::group(['middleware' => ['mod']], function(){

    Route::get('/mod', function(){echo "you have acces";});

});

//Catch anything that isn't listed
Route::any('any', function(){
    return view('404');
});
