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


Route::get('login', 'UserController@GetloginAdmin');
Route::post('login', 'UserController@PostloginAdmin')->name('login');
Route::get('logout', 'UserController@GetlogoutAdmin')->name('logout');

Route::group(['middleware' => 'adminLogin', 'prefix' => 'admin'], function () {
    Route::get('/', 'HomeController@dashboard')->name('dashboard');
    Route::get('showCate', 'CategoryController@showTable');
    Route::resource('category', 'CategoryController');
    Route::get('showProductType', 'ProductTypeController@showProductType');
    Route::resource('producttype', 'ProductTypeController');
});
