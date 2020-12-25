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

Route::get('/', 'AdminController@index')->name('home')->middleware('auth');
Route::get('/admin', 'AdminController@adminDashboard')->name('dashboard');
Route::get('test', function () {
    return view('test');
});
Route::get('login', 'LoginController@showLoginform')->name('login');
Route::post('login', 'LoginController@Login')->name('login');
Route::get('logout', 'LoginController@Logout')->name('logout');
Route::get('createjson', 'AdminController@showcreatejson')->name('showcreatejson')->middleware('auth');
Route::post('createjson', 'AdminController@createnewjson')->name('createnewjson')->middleware('auth');
Route::get('showjson', 'AdminController@showjson')->name('showjson')->middleware('auth');
Route::get('downloadjson', 'AdminController@downloadjson')->name('downloadjson')->middleware('auth');


// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
