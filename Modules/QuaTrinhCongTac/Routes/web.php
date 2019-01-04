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

Route::prefix('quatrinhcongtac')->group(function() {
    
	Route::get('index', 'QuaTrinhCongTacController@index')->name('quatrinhcongtac.index');
	Route::redirect('/', 'quatrinhcongtac/index');
	Route::get('detail/{id}', 'QuaTrinhCongTacController@show')->name('quatrinhcongtac.detail');
	Route::post('delete', 'QuaTrinhCongTacController@delete')->name('quatrinhcongtac.delete');

	Route::get('create', 'QuaTrinhCongTacController@create')->name('quatrinhcongtac.create');
	Route::post('store', 'QuaTrinhCongTacController@store')->name('quatrinhcongtac.store');
	Route::get('edit/{id}', 'QuaTrinhCongTacController@edit')->name('quatrinhcongtac.edit');
	Route::post('update', 'QuaTrinhCongTacController@update')->name('quatrinhcongtac.update');
	Route::post('delete', 'QuaTrinhCongTacController@destroy')->name('quatrinhcongtac.delete');
});
