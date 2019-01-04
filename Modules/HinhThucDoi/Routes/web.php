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

Route::prefix('hinhthucdoi')->group(function() {
    
	Route::get('index', 'HinhThucDoiController@index')->name('hinhthucdoi.index');
	Route::redirect('/', 'hinhthucdoi/index');
	Route::get('detail/{id}', 'HinhThucDoiController@show')->name('hinhthucdoi.detail');
	Route::post('delete', 'HinhThucDoiController@delete')->name('hinhthucdoi.delete');

	Route::get('create', 'HinhThucDoiController@create')->name('hinhthucdoi.create');
	Route::post('store', 'HinhThucDoiController@store')->name('hinhthucdoi.store');
	Route::get('edit/{id}', 'HinhThucDoiController@edit')->name('hinhthucdoi.edit');
	Route::post('update', 'HinhThucDoiController@update')->name('hinhthucdoi.update');
	Route::post('delete', 'HinhThucDoiController@destroy')->name('hinhthucdoi.delete');
});
