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


//Auth Controller
Route::get('/login', 'AuthController@login')->name('login');
route::get('/register', 'AuthController@registerIndex')->name('register');
Route::post('/registerStore', 'AuthController@register')->name('register.store');
Route::post('/loginStore', 'AuthController@loginStore')->name('login.store');
Route::post('/logout', 'AuthController@logout')->name('logout');


//Dashboard Controller
Route::get('/', 'DashboardController@index')->name('dashboard')->middleware('auth');

//Guru Controller 
Route::get('/guru/create', 'GuruController@create')->name('guru.create')->middleware('auth');
Route::get('/guru/laporan', 'GuruController@laporan')->name('guru.laporan')->middleware('auth');
Route::post('/guru/store', 'GuruController@store')->name('guru.store')->middleware('auth');


//Kaprog Controller
Route::get('/kaprog/balas/{id}', 'KaprogController@balas')->name('kaprog.balas')->middleware('auth');
Route::post('/kaprog/store', 'KaprogController@store')->name('kaprog.store')->middleware('auth');
Route::get('/kaprog/tanggapan', 'KaprogController@laporan')->name('kaprog.tanggapan')->middleware('auth');

