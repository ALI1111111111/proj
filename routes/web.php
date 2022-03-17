<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/water', function () {
    return view('waterlevel/water');
});

Route::get('/', function () {
    return view('dashboard/index');
});

Route::get('/water/value','WaterController@show');
Route::view('/auto','arduino/auto');

Route::get('/ard/val','ArdController@index');
Route::post('/ard/btn','ArdController@store');

Route::get('/ard/{id}','ArdController@show');
