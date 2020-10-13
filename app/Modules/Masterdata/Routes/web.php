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

Route::group(['prefix' => 'masterdata', 'middleware' => 'auth'], function () {
    
    Route::group(['prefix' => 'petugas'], function () {

    	Route::get('/', 'PetugasController@index')->middleware('permission:Aksi master');
        Route::get('add', 'PetugasController@page_add')->middleware('permission:Aksi master');
        Route::get('show/{id}', 'PetugasController@page_show')->middleware('permission:Aksi master')->name('account');;
        Route::get('pullData', 'PetugasController@pullData');

    });

    Route::group(['prefix' => 'subdit'], function () {

    	Route::get('/', 'SubditController@index')->middleware('permission:Aksi master');
        Route::get('add', 'SubditController@page_add')->middleware('permission:Aksi master');
        Route::get('show/{id}', 'SubditController@page_show')->middleware('permission:Aksi master');

    });

    Route::group(['prefix' => 'seksi'], function () {

        Route::get('/', 'SeksiController@index')->middleware('permission:Aksi master');
        Route::get('add', 'SeksiController@page_add')->middleware('permission:Aksi master');
        Route::get('show/{id}', 'SeksiController@page_show')->middleware('permission:Aksi master');

    });

    Route::group(['prefix' => 'kegiatan'], function () {

        Route::get('/', 'KegiatanController@index')->middleware('permission:Aksi master');
        Route::get('add', 'KegiatanController@page_add')->middleware('permission:Aksi master');
        Route::get('show/{id}', 'KegiatanController@page_show')->middleware('permission:Aksi master');

    });

    Route::group(['prefix' => 'ruang'], function () {

        Route::get('/', 'RuangController@index')->middleware('permission:Aksi master');
        Route::get('add', 'RuangController@page_add')->middleware('permission:Aksi master');
        Route::get('show/{id}', 'RuangController@page_show')->middleware('permission:Aksi master');

    });

});