<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	if (!session('nip')) {
		return redirect ('login');
	} else {
		return view('home');
	}
});

Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/cek', 'API\UserController@cek');
Route::get('/regis', '\App\Http\Controllers\Auth\LoginController@regis')->name('regis');
Route::get('/cok', 'API\JamaahController@getDataJamaahByNip');
