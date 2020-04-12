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

Auth::routes();

Route::get('/', 'WebboardController@index')->name('index');

Route::prefix('dashboard')->middleware(['web', 'auth'])->group(function () {

	Route::get('/', 'DashboardController@index')->name('dashboard');
	Route::get('/mahasiswa', 'MahasiswaController@index')->name('mahasiswa');
	Route::get('/mahasiswa/create', 'MahasiswaController@create');
	Route::post('/mahasiswa', 'MahasiswaController@store');
	Route::get('/mahasiswa/{id}/edit', 'MahasiswaController@edit');
	Route::patch('/mahasiswa/{id}', 'MahasiswaController@update');
	Route::get('/mahasiswa/{id}', 'MahasiswaController@show');
	Route::delete('/mahasiswa/{id}/delete', 'MahasiswaController@destroy');

});