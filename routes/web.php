<?php
//
// /*
// |--------------------------------------------------------------------------
// | Web Routes
// |--------------------------------------------------------------------------
// |
// | Here is where you can register web routes for your application. These
// | routes are loaded by the RouteServiceProvider within a group which
// | contains the "web" middleware group. Now create something great!
// |
// */
//
// Route::get('/', function () {
//     return view('welcome');
// });
//
// Route::get('test',function(){
// 	echo 333;
// });
// //Buổi 1: route
// /*--------------------------------------------*/
//
//
// //buổi 2
// /*------------------------------------------------*/
//
// 	Route::get('goicontroller','PageController@getData');
//
// 	Route::get('layten/{ten}','PageController@getTen');
//
// 	Route::get('vi-du/{ten}',[
// 			'as'=>'route1',
// 			'uses'=>'PageController@getTen'
// 	]);
//
// 	Route::get('test_route','PageController@testRoute');
//
// 	Route::get('route2','PageController@testRoute2');
//
// 	Route::get('test2',[
// 		'as'=>'test',
// 		'uses'=>'PageController@testRoute3'
// 	]);
//
// 	Route::get('goi_form','PageController@getForm');
//
// 	Route::post('goi_form',[
// 		'as'=>'goi_form',
// 		'uses'=>'PageController@postForm'
// 	]);
//
// 	Route::get('setCookie','PageController@setCookie');
// 	Route::get('getCookie','PageController@getCookie');
// //end buổi 2
//
//
// 	Route::get('upload-file',[
// 		'as'=>'upload_file',
// 		'uses'=>'PageController@getFormUpload'
// 	]);
//
// 	Route::post('upload-file',[
// 		'as'=>'upload_file',
// 		'uses'=>'PageController@postFormUpload'
// 	]);
//
// 	Route::get('sent_data_view',[
// 		'as'=>'sent_data_view',
// 		'uses'=>'PageController@getSentData'
// 	]);
//
//
//   //buổi 4
//   Route::get('get_form','PageController@getFormMiddleware');
//
//   Route::post('kiemtra_middleware',[
//     'middleware'=>'kiemtra',
//     'as'=>'kiemtra_middleware',
//     'uses'=>'PageController@kiemtraMiddleware'
//   ]);
//
//   Route::get('tao_session',[
//     'as'=>'tao_sesion',
//     'uses'=>'PageController@createSession'
//   ]);
//
//   Route::get('xoa_sesion',[
//     'as'=>'xoa_sesion',
//     'uses'=>'PageController@delSession'
//   ]);
//
//   Route::get('xoa_cot','PageController@getTaoBang');
//   Route::get('them_cot','PageController@getThemCot');
//
//   Route::get('sua-ten-bang','PageController@getSuaTen');
//   Route::get('xoabang',function(){
//     Schema::dropIfExists('product_type');
//     echo 'đã xóa';
//   });
//
//
//   Route::get('get_data','PageController@getDataUser');


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

