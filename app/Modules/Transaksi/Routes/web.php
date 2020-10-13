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
Route::group(['prefix' => 'transaksi', 'middleware' => 'auth'], function () {

	Route::group(['prefix' => 'pendataan'], function () {

    	Route::get('/', 'PendataanController@index')->middleware('permission:Melihat daftar pendataan');
        Route::get('add', 'PendataanController@page_add')->middleware('permission:Menambah data pendataan');
        Route::get('show/{id}', 'PendataanController@page_show')->middleware('permission:Mengubah data pendataan')->name('account');
        Route::get('pullData', 'PendataanController@pullData');
        Route::get('cetak_pdf/{id}', 'PendataanController@cetak_pdf')->middleware('permission:Mengubah data pendataan');
        });

	Route::group(['prefix' => 'PendataanDrcBali'], function () {

    	Route::get('/', 'PendataanDrcBaliController@index')->middleware('permission:Melihat daftar pendataan');
        Route::get('add', 'PendataanDrcBaliController@page_add')->middleware('permission:Menambah data pendataan');
        Route::get('show/{id}', 'PendataanDrcBaliController@page_show')->middleware('permission:Mengubah data pendataan');
        Route::get('pullData', 'PendataanDrcBaliController@pullData');
        Route::get('cetak_pdf/{id}', 'PendataanDrcBaliController@cetak_pdf')->middleware('permission:Mengubah data pendataan');
        });
});
