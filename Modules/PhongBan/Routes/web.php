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

Route::prefix('phongban')->group(function() {
    
	Route::get('index', 'PhongBanController@index')->name('phongban.index');
	Route::redirect('/', 'phongban/index');
	Route::get('detail/{id}', 'PhongBanController@show')->name('phongban.detail');
	Route::post('delete', 'PhongBanController@delete')->name('phongban.delete');

	Route::get('create', 'PhongBanController@create')->name('phongban.create');
	Route::post('store', 'PhongBanController@store')->name('phongban.store');
	Route::get('edit/{id}', 'PhongBanController@edit')->name('phongban.edit');
	Route::post('update', 'PhongBanController@update')->name('phongban.update');
	Route::post('delete', 'PhongBanController@destroy')->name('phongban.delete');
});
