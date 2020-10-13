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

Route::group(['prefix' => 'laporan', 'middleware' => 'auth'], function () {
   Route::group(['prefix' => 'laporan'], function () {

    	Route::get('/', 'LaporanController@index');
        Route::get('show/{id}', 'LaporanController@page_show')->middleware('permission:Mencetak seluruh Laporan');
        Route::get('pdf', 'LaporanController@cetak_pdf')->middleware('permission:Mencetak seluruh Laporan');
        Route::get('export_excel', 'LaporanController@export_excel')->middleware('permission:Mencetak seluruh Laporan');
        Route::get('search', 'LaporanController@search');
        });
});
