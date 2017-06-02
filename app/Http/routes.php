<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
})->middleware('guest');

// 认证路由...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// 注册路由...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Restaurant路由
Route::get('/restaurants', 'RestaurantController@index');
Route::post('/restaurant', 'RestaurantController@store');
Route::delete('/restaurant/{restaurant}', 'RestaurantController@destroy');

// Dish路由
Route::get('/dishes/{restaurant}', 'DishController@index');
Route::post('/dish/store/{restaurant}', 'DishController@store');
Route::post('/dish/delete/{dish}', 'DishController@destroy');
Route::post('/dish/modify/{dish}', 'DishController@modify');
Route::post('/dish/modify/index/{dish}', 'DishController@modifyIndex');

// Table路由
Route::get('/tables/{restaurant}', 'TableController@index');
Route::post('/table/store/{restaurant}', 'TableController@store');
Route::post('/table/delete/{table}', 'TableController@destroy');

// Order路由
Route::get('/orders/{restaurant}', 'OrderController@index');
Route::post('/order/modify/{order}', 'OrderController@modify');
Route::post('/order/delete/{order}', 'OrderController@destroy'); // Unused.

// Orders-Dishes路由
Route::get('/ordersDishes/{restaurant}', 'OrderDishController@index');
Route::post('/orderDish/{orderDish}', 'OrderDishController@modify');

// Guest 路由
Route::get('/guest/{restaurant}/{table}', 'GuestController@index');
Route::post('/guest/create/{dish}/{order}', 'GuestController@create');
Route::post('/guest/delete/{orderDish}', 'GuestController@delete');
Route::post('/guest/confirm/{order}', 'GuestController@confirm');