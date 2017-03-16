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

Route::get('index',[
  'as'=>'index',
  'uses'=>'PageController@getIndex'
]);
Route::get('loai-san-pham',[
	'as'=>'loaisp',
	'uses'=>'PageController@getLoai'
]);
Route::get('chi-tiet-san-pham',[
	'as'=>'chitiet',
	'uses'=>'PageController@getChitiet'
]);

Route::get('mua-hang/{id}',[
	'as'=>'add-to-cart',
	'uses'=>'PageController@getAddToCart'
]);
