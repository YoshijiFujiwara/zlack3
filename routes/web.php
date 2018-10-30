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

// SPA用
Route::view('/', 'home');
Route::view('/{any}', 'home');
Route::view('/{any}/{any1}', 'home');
Route::view('/{any}/{any1}/{any2}', 'home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
