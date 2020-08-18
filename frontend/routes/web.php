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
    Route::get('{slugFolder}', ['uses' => 'CategoryController@index']);
    Route::get('{slugFolder}/{slugDetail}.html', ['uses' => 'DetailController@index']);
    // Bán bất động sản & subfolder
    Route::get('ban-bat-dong-san/{slugFolder}', ['uses' => 'CategoryController@index']);
    // Cho thuê bất động sản & subfolder
    Route::get('cho-thue-bat-dong-san/{slugFolder}', ['uses' => 'CategoryController@index']);
    // Tin tức & subfolder
    Route::get('tin-tuc/{slugFolder}', ['uses' => 'CategoryController@index']);
    // Landing page Chứng chỉ môi giới bất động sản
    Route::get('dao-tao/chung-chi-moi-gioi-bat-dong-san', ['uses' => 'LandingpageController@chungchimoigioibatdongsan']);
    // Tin tuyển dụng
    Route::get('tin-tuyen-dung/{slugFolder}', ['uses' => 'CategoryController@index']);
});
