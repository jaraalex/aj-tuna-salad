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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'product',
              //'middleware' => 'checkapitoken',
              'namespace' => 'Api'], function () {
    Route::get('/', 'ProductController@index');
    Route::get('/{id}', 'ProductController@show');
    Route::post('/', 'ProductController@store');
    Route::put('/{id}', 'ProductController@update');
    Route::delete('/{id}', 'ProductController@destroy');
});
