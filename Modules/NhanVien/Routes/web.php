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

Route::prefix('nhanvien')->group(function() {
    
  	Route::get('index', 'NhanVienController@index')->name('nhanvien.index');
  	Route::redirect('/', 'nhanvien/index');
   Route::get('detail/{id}', 'NhanVienController@show')->name('nhanvien.detail');
   Route::post('delete', 'NhanVienController@delete')->name('nhanvien.delete');
   
    Route::get('create', 'NhanVienController@create')->name('nhanvien.create');
    Route::post('store', 'NhanVienController@store')->name('nhanvien.store');
    Route::get('edit/{id}', 'NhanVienController@edit')->name('nhanvien.edit');
    Route::post('update', 'NhanVienController@update')->name('nhanvien.update');
    Route::post('delete', 'NhanVienController@destroy')->name('nhanvien.delete');
});
