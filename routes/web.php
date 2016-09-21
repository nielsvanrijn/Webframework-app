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

Route::get('/', function () {
    return view('welcome');
});

Route::get('moderator/{id}', function($id){
    $moderator = App\Moderator::find($id);
    echo $moderator->name;
});

Route::get('moderator_name', function(){
    $moderator = App\Moderator::where('name', '=', 'Antwan')->first();
    echo $moderator->id;
});
