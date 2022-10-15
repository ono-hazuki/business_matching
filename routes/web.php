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

Route::get('/', 'DemandController@index')->middleware('auth');

Route::resource('demands', 'DemandController')->middleware('auth');

Route::get('/my_demands', 'DemandController@my_demands')->middleware('auth');
