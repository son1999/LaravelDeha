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


Route::get('admin/login','UserController@GetloginAdmin');
Route::post('admin/login','UserController@PostloginAdmin')->name('login');
Route::get('admin/logout','UserController@GetlogoutAdmin')->name('logout');

Route::group(['middleware'=>'adminLogin','prefix' => 'admin'],function(){
	Route::get('/','HomeController@dashboard')->name('dashboard');
	Route::get('showCate','CategoryController@showTable');
	Route::resource('category','CategoryController');
	Route::get('showProductType','ProductTypeController@showData');
	Route::resource('producttype','ProductTypeController');
});
