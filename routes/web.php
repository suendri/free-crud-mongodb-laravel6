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
    return view('welcome');
});

Auth::routes();

Route::prefix('dashboard')->middleware(['web', 'auth'])->group(function () {
	
    Route::get('/', 'DashboardController@index');
    Route::get('/profile', 'ProfileController@index');
    Route::patch('/profile', 'ProfileController@update');
    Route::resource('/mahasiswa', 'MahasiswaController');
    Route::resource('/user', 'UserController');


});