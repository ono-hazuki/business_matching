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

Route::get('/consenters/{demand}', 'ConsenterController@judge_index')->middleware('auth');

Route::get('/candidacy_demands', 'ConsenterController@candidacy_demands')->middleware('auth');

Route::post('/consenters/{demand}', 'ConsenterController@store')->middleware('auth');

Route::post('/consenters/{demand}/{consenter}', 'ConsenterController@update')->middleware('auth');

Route::post('/consenters/{demand}/{consenter}', 'ConsenterController@destroy')->middleware('auth');
