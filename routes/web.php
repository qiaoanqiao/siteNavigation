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
Route::get('/', 'PageDataController@indexView');
Route::get('/index.html', 'PageDataController@indexView');
Route::get('/about.html', 'PageDataController@aboutView');
Route::get('/about', 'PageDataController@aboutView');
