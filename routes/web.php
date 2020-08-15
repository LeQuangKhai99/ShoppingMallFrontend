<?php

use Illuminate\Support\Facades\Route;

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
    'uses'=>'ProductController@index',
    'as'=>'home'
]);

Route::get('/category/{slug}_{id}', [
    'uses'=>'ProductController@category',
    'as'=>'category.product'
]);

Route::get('/detail/{slug}_{id}', [
    'uses'=>'ProductController@detail',
    'as'=>'product.detail'
]);

Route::get('/search', [
    'uses'=>'ProductController@search',
    'as'=>'product.search'
]);

Route::post('/addCart', [
    'uses'=>'CartController@addCart',
    'as'=>'cart.add'
])->middleware('check_login');

Route::get('/gio-hang',[
    'uses'=>'CartController@index',
    'as'=>'cart.index'
])->middleware('check_login');

Route::post('/cap-nhat-gio-hang', [
    'uses'=>'CartController@updateCart',
    'as'=>'cart.update'
])->middleware('check_login');

Route::get('/xoa-gio-hang/{id}', [
    'uses'=>'CartController@deleteCart',
    'as'=>'cart.delete'
])->middleware('check_login');

Route::get('/thanh-toan', [
    'uses'=>'CartController@checkout',
    'as'=>'cart.checkout'
])->middleware('check_login');

Route::post('/thanh-toan', [
    'uses'=>'CartController@postCheckout',
    'as'=>'cart.checkout'
])->middleware('check_login');

Route::get('/dang-nhap', [
    'uses'=>'LoginController@login',
    'as'=>'login.index'
]);
Route::post('/dang-nhap', [
    'uses'=>'LoginController@postLogin',
    'as'=>'login.login'
]);

Route::post('/dang-ky', [
    'uses'=>'LoginController@postRegister',
    'as'=>'login.register'
]);

Route::get('/dang-xuat', [
    'uses'=>'LoginController@logout',
    'as'=>'login.logout'
]);
