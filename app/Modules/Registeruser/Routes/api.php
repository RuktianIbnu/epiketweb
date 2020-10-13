<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your module. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group(['prefix' => 'v1/Registeruser'], function () {

	Route::group(['prefix' => 'RegisterUser'], function () {
    	Route::post('acc/{id}', 'RegisterUserController@acc');
    	Route::post('delete/{id}', 'RegisterUserController@delete');
    	Route::post('store', 'RegisterUserController@store');
    });
});