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

Route::prefix('chucvu')->group(function() {
    
	Route::get('index', 'ChucVuController@index')->name('chucvu.index');
	Route::redirect('/', 'chucvu/index');
	Route::get('detail/{id}', 'ChucVuController@show')->name('chucvu.detail');
	Route::post('delete', 'ChucVuController@delete')->name('chucvu.delete');

	Route::get('create', 'ChucVuController@create')->name('chucvu.create');
	Route::post('store', 'ChucVuController@store')->name('chucvu.store');
	Route::get('edit/{id}', 'ChucVuController@edit')->name('chucvu.edit');
	Route::post('update', 'ChucVuController@update')->name('chucvu.update');
	Route::post('delete', 'ChucVuController@destroy')->name('chucvu.delete');
});
