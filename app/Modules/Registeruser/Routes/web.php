<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your module. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::group(['prefix' => 'registeruser', 'middleware' => 'auth'], function () {
    
    Route::group(['prefix' => 'registeruser'], function () {

    	Route::get('/', 'RegisterUserController@index')->middleware('permission:Aksi master');
    	Route::get('add', 'RegisterUserController@page_add');
    });
});