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

Route::group(['prefix' => 'v1/masterdata', 'middleware' => 'auth:api'], function () {

	Route::group(['prefix' => 'petugas'], function () {
    	Route::post('store', 'PetugasController@store');
    	Route::post('edit', 'PetugasController@edit');
    	Route::post('delete/{id}', 'PetugasController@delete');
        Route::post('changePassword', 'PetugasController@changePassword');
    });
	
	Route::group(['prefix' => 'subdit'], function () {
        Route::post('store', 'SubditController@store');
        Route::post('edit', 'SubditController@edit');
        Route::post('delete/{id}', 'SubditController@delete');
    });

    Route::group(['prefix' => 'seksi'], function () {
        Route::post('store', 'seksiController@store');
        Route::post('edit', 'seksiController@edit');
        Route::post('delete/{id}', 'seksiController@delete');
    });

    Route::group(['prefix' => 'kegiatan'], function () {
        Route::post('store', 'KegiatanController@store');
        Route::post('edit', 'KegiatanController@edit');
        Route::post('delete/{id}', 'KegiatanController@delete');
    });

    Route::group(['prefix' => 'ruang'], function () {
        Route::post('store', 'RuangController@store');
        Route::post('edit', 'RuangController@edit');
        Route::post('delete/{id}', 'RuangController@delete');
    });

});