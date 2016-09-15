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

Route::get('hello/{name}', function($name){
    echo 'Hello '. $name;
});

// Create an item
Route::post('test', function(){
    echo 'We just created an item';
});

// Read an item
Route::get('test', function(){

});

// Update an item
Route::put('test', function(){
    echo 'We just updated an item';
});

// Delete an item
Route::delete('test', function(){
    echo 'We just deleted an item';
});

