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

Route::group(['prefix' => 'v1/transaksi', 'middleware' => 'auth:api'], function () {

	Route::group(['prefix' => 'pendataan'], function () {
    	Route::post('store', 'PendataanController@store');
    	Route::post('edit', 'PendataanController@edit');
    	Route::post('delete/{id}', 'PendataanController@delete');
    });

    Route::group(['prefix' => 'PendataanDrc'], function () {
    	Route::post('store', 'PendataanDrcBaliController@store');
    	Route::post('edit', 'PendataanDrcBaliController@edit');
    	Route::post('delete/{id}', 'PendataanDrcBaliController@delete');
    });

});
