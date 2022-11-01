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



Route::get('/candidacy_demands', 'ConsenterController@candidacy_demands')->middleware('auth');

Route::post('/consenters/{demand}', 'ConsenterController@store')->middleware('auth');

Route::post('/consenters/{demand}/{consenter}/update', 'ConsenterController@update')->middleware('auth');

Route::post('/consenters/{demand}/{consenter}/destroy', 'ConsenterController@destroy')->middleware('auth');


Route::get('/direct_messages/{demand}', 'DirectMessageController@message')->middleware('auth');

Route::post('/direct_messages/{demand}', 'DirectMessageController@store')->middleware('auth');

Route::post('/direct_messages/{demand}/{directMessage}/destroy', 'DirectMessageController@destroy')->middleware('auth');


