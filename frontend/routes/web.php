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

Route::group(['middleware' => 'web'], function () {

    // Trang dashboard
    Route::get('/', 'HomepageController@index');

    // Bán bất động sản
    Route::get('ban-bat-dong-san', ['uses' => 'CategoryController@index']);
    Route::get('ban-bat-dong-san/{slugFolder}', ['uses' => 'CategoryController@index']);
    Route::get('ban-bat-dong-san/{slugDetail}.html', ['uses' => 'DetailController@index']);

    // Cho thuê bất động sản
    Route::get('cho-thue-bat-dong-san', ['uses' => 'CategoryController@index']);
    Route::get('cho-thue-bat-dong-san/{slugFolder}', ['uses' => 'CategoryController@index']);
    Route::get('cho-thue-bat-dong-san/{slugDetail}.html', ['uses' => 'DetailController@index']);
});
