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

Route::get('/',[
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

Route::get('mua-hang/{id}/{soluong}',[
	'as'=>'add-to-cart',
	'uses'=>'PageController@getAddToCart'
]);

Route::get('xoa-phan-tu-gio-hang/{id}',[
	'as'=>'del-cart',
	'uses'=>'PageController@getDelItemCart'
]);

Route::get('dat-hang',[
	'as'=>'dathang',
	'uses'=>'PageController@getCheckout'
]);


Route::post('dat-hang',[
	'as'=>'dathang',
	'uses'=>'PageController@postCheckout'
]);

Route::get('gui-mail','PageController@sendMail');

Route::get('dang-ki',[
	'as'=>'dangki',
	'uses'=>'PageController@getRegister'
]);

Route::post('dang-ki',[
	'as'=>'dangki',
	'uses'=>'PageController@postRegister'
]);
Route::get('send-to-mail/{id}/{token}',[
	'as'=>'send-to-mail',
	'uses'=>'PageController@activeUser'
]);

Route::get('dang-nhap',[
	'as'=>'dangnhap',
	'uses'=>'PageController@getLogin'
]);

Route::post('dang-nhap',[
	'as'=>'dangnhap',
	'uses'=>'PageController@postLogin'
]);

Route::get('dang-xuat',[
	'as'=>'dangxuat',
	'uses'=>'PageController@getLogout'
]);
Route::get('tim-kiem',[
	'as'=>'search',
	'uses'=>'PageController@getSearch'
]);
