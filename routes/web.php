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


Route::group(['prefix' => 'admin'],function(){
	Route::get('/dashboad','CategoryController@dashboard')->name('dashboard');
	Route::get('showCate','CategoryController@showTable');
    Route::resource('category','CategoryController');
});
Auth::routes();

Route::get('/admin', 'HomeController@index')->name('home');
