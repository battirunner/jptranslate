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
Route::get('createjson', 'AdminController@showcreatejson')->name('showcreatejson');
Route::post('createjson', 'AdminController@createnewjson')->name('createnewjson');
Route::get('showjson', 'AdminController@showjson')->name('showjson');
