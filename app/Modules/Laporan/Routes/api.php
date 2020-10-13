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

Route::group(['prefix' => 'v1/laporan', 'middleware' => 'auth:api'], function () {
    // return $request->laporan();
    Route::group(['prefix' => 'laporan'], function () {
    	Route::POST('search', 'LaporanController@search');
    });
});
