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



Route:: get('getproducttype','AjaxController@getproducttype');
Route :: group(['prefix' => 'admin','middleware'=>'adminMiddleware'], function(){
    Route::view('/','admin.pages.index');
    Route::resource('category','CategoryController');
    Route::resource('producttype','ProductTypeController');
    Route::resource('product','ProductController');
    Route:: resource('order','OrderController');
    Route::post('updatePro/{id}','ProductController@update');
});

Route::get('callback/{social}','HomeController@handleProviderCallback');
Route::get('login/{social}','HomeController@redirectProvider')->name('login.social');
Route::get('logout','UserController@logout');
Route::post('login','UserController@loginClient')->name('login');

Route::post('updatePass','UserController@updatePassClient');

Route::post('register','UserController@registerClient')->name('register');

Route::resource('cart','CartController');
Route::get('addcart/{id}','CartController@addCart')->name('addCart');

Route:: post('comment/{id}','CommentController@postComment')->name('Comment');
Route::get('checkout','CartController@checkout')->name('cart.checkout');

Route::resource('customer','CustomerController');

Route::post('admin/login','UserController@loginAdmin')->name('admin.login');
Route::view('admin/login','admin.pages.login')->name('login.admin');

Route::get('lienhe','ContactController@getContact')->name('get.contact');
Route::post('lienhe','ContactController@saveContact');

Route::get('chitietsp/{id}','OrderDetailController@getChitiet')->name('Chitiet');

Route::get('/', 'HomeController@index');
Route::get('trangchu', 'HomeController@index')->name('trangchu');
Route :: get('search',[
    'as'=>'search',
    'uses'=> 'SearchController@getSearch'
]);
Route::get('loai-san-pham/{type}',[
    'as'=>'loaisanpham',
    'uses'=>'PagesControler@getLoaisp'
]);

Route:: get('order/{id}','OrderController@index');
Route:: get('order/{id}','OrderController@destroy');
Route::get('/excel_export','ExportExcelContrller@index');
Route::get('/excel_export/excel','ExportExcelContrller@excel')->name('excel_export.excel');

