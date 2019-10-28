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

Route::get('/', 'ItemController@index');

#商品詳細ページの表示
Route::get('/item/{item}', 'ItemController@item_detail');

#購入履歴ページ
Route::get('/transaction','TransactionController@index');

#カートに追加する
Route::post('/cartitem', 'CartItemController@store');
Route::post('/item/cartitem', 'CartItemController@store');

#カートの中身を表示する
Route::get('/cartitem', 'CartItemController@index');

#購入画面からitem詳細へ
Route::get('/cartitem/{item}', 'ItemController@show');

#item詳細画面からカートへ追加
Route::post('/cartitem/cartitem','CartItemController@store');

#カートの中身の情報を変更する
Route::put('/cartitem/{cartItem}', 'CartItemController@update');
Route::delete('/cartitem/{cartItem}', 'CartItemController@destroy');

#購入画面の表示
Route::get('/buy', 'BuyController@index');


#購入画面の保存
Route::post('/buy', 'BuyController@store');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
