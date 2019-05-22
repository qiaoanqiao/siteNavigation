<?php
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:*');
header('Access-Control-Allow-Headers:*');

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/card', 'CardsController@index')->name('api.card.index');
Route::get('/page-data/home', 'PageDataController@homePage')
    ->name('api.page-data.home');
