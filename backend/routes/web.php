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

//Auth::routes();
// Authentication Routes...
Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@getLogin']);
Route::post('login', ['uses' => 'Auth\LoginController@postLogin']);
Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);
// Password Reset Routes...
Route::post('password/email', [
    'as' => 'password.email',
    'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail'
]);
Route::get('password/reset', [
    'as' => 'password.request',
    'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm'
]);
Route::post('password/reset', [
    'as' => 'password.update',
    'uses' => 'Auth\ResetPasswordController@reset'
]);
Route::get('password/reset/{token}', [
    'as' => 'password.reset',
    'uses' => 'Auth\ResetPasswordController@showResetForm'
]);
// Registration Routes...
Route::get('register', [
    'as' => 'register',
    'uses' => 'Auth\RegisterController@showRegistrationForm'
]);
Route::post('register', [
    'uses' => 'Auth\RegisterController@register'
]);
Route::group(['middleware' => 'auth'], function () {
// Trang dashboard
    Route::get('/', 'DashboardController@index');
// Trang thống kê lượng giỏ hàng hiện tại
    Route::get('/carts', 'CartController@index');
// Trang quản trị category
    Route::group(['prefix' => 'category', 'as' => 'category'], function () {
        Route::get('/', ['as' => 'index', 'uses' => 'CategoryController@index']);
        Route::get('/{id?}', ['as' => 'index', 'uses' => 'CategoryController@index']);
        Route::post('/store', ['uses' => 'CategoryController@store']);
        Route::get('/show/{id?}', ['uses' => 'CategoryController@show']);
        Route::get('/edit/{id?}', ['uses' => 'CategoryController@edit']);
        Route::post('/update/{id?}', ['uses' => 'CategoryController@update']);
        Route::get('/delete/{id?}', ['uses' => 'CategoryController@destroy']);
        Route::post('/adddiease/{id?}', ['uses' => 'CategoryController@addDisease']);
    });
// QUẢN TRỊ TAGS >> TIEMTT
    Route::group(['prefix' => 'tags',], function () {
        Route::get('/', ['as' => 'index', 'uses' => 'TagsController@index']);
        //Route::get('/{id?}', ['as' => 'index', 'uses' => 'TagsController@index']);

        Route::post('/store', ['uses' => 'TagsController@store']);
        Route::get('/show/{id?}', ['uses' => 'TagsController@show']);
        Route::get('/edit/{id?}', ['uses' => 'TagsController@edit']);
        Route::post('/edit/{id?}', ['uses' => 'TagsController@update']);
        Route::get('/delete/{id?}', ['uses' => 'TagsController@destroy']);
        Route::get('/search', ['uses' => 'TagsController@begin_search']);
        Route::post('/search', ['uses' => 'TagsController@ajax_search']);
        Route::post('/addtags', ['uses' => 'TagsController@add_tags']);
    });

// Trang quản trị sức khỏe
    Route::group(['prefix' => 'healthy', 'as' => 'category_disease', 'middleware' => 'auth'], function () {
        Route::get('/{slug?}', ['as' => 'index', 'uses' => 'CategoryController@disease']);
    });
// Trang quản trị các chủ đề
    Route::group(['prefix' => 'disease', 'as' => 'disease', 'middleware' => 'auth'], function () {
        Route::get('/', ['as' => 'index', 'uses' => 'DiseaseController@index']);
        Route::get('/{id?}', ['as' => 'index', 'uses' => 'DiseaseController@index']);
        Route::post('/store', ['uses' => 'DiseaseController@store']);
        Route::get('/show/{id?}', ['uses' => 'DiseaseController@show']);
        Route::get('/edit/{id?}', ['uses' => 'DiseaseController@edit']);
        Route::post('/update/{id?}', ['uses' => 'DiseaseController@update']);
        Route::get('/delete/{id?}', ['uses' => 'DiseaseController@destroy']);
        Route::get('/import/data', ['uses' => 'DiseaseController@importData']);
        Route::get('/get_list_disease_by/category_id/{category_id}', ['uses' => 'DiseaseController@getListDiseaseByCategoryId']);
    });
// Trang quản trị đi vào nhanh các page giới thiệu
    Route::group(['prefix' => 'landingpage', 'as' => 'landingpage', 'middleware' => 'auth'], function () {
        Route::get('/', ['as' => 'index', 'uses' => 'LandingpageController@index']);
        Route::get('/gioi-thieu-5-nhat-nhat', ['uses' => 'LandingpageController@gioithieu5nhatnhat']);
        Route::get('/dinh-nghia-dong-y-the-he-2', ['uses' => 'LandingpageController@dinhnghiadongythehe2']);
        Route::get('/nha-may-duoc', ['uses' => 'LandingpageController@nhamayduoc']);
        Route::get('/cong-ty-lien-ket', ['uses' => 'LandingpageController@congtylienket']);
        Route::get('/chinh-sach-doi-tra', ['uses' => 'LandingpageController@chinhsachdoitra']);
        Route::get('/phuong-thuc-van-chuyen', ['uses' => 'LandingpageController@phuongthucvanchuyen']);
        Route::get('/chinh-sach-bao-mat', ['uses' => 'LandingpageController@chinhsachbaomat']);
        Route::get('/cham-soc-sau-ban-hang', ['uses' => 'LandingpageController@chamsocsaubanhang']);
        Route::get('/huong-dan-mua-hang', ['uses' => 'LandingpageController@huongdanmuahang']);
        Route::get('/{id?}', ['as' => 'index', 'uses' => 'LandingpageController@index']);
        Route::post('/update', ['uses' => 'LandingpageController@update']);
    });
// Trang quản trị các page tĩnh
    Route::group(['prefix' => 'page', 'as' => 'page', 'middleware' => 'auth'], function () {
        Route::get('/', ['as' => 'index', 'uses' => 'PageController@index']);
        Route::get('/create', ['uses' => 'PageController@create']);
        Route::post('/store', ['uses' => 'PageController@store']);
        Route::get('/show/{id?}', ['uses' => 'PageController@show']);
        Route::get('/edit/{id?}', ['uses' => 'PageController@edit']);
        Route::post('/update/{id?}', ['uses' => 'PageController@update']);
        Route::get('/delete/{id?}', ['uses' => 'PageController@destroy']);
    });
// Trang quản trị những câu hỏi thường gặp
    Route::group(['prefix' => 'frequently-questions', 'as' => 'q&a', 'middleware' => 'auth'], function () {
        Route::get('/', ['as' => 'index', 'uses' => 'QuestionController@index']);
        Route::get('/create', ['uses' => 'QuestionController@create']);
        Route::post('/store', ['uses' => 'QuestionController@store']);
        Route::get('/show/{id?}', ['uses' => 'QuestionController@show']);
        Route::get('/show/{question_id?}/answer/{action?}/{answer_id?}', ['uses' => 'QuestionController@show']);
        Route::get('/edit/{id?}', ['uses' => 'QuestionController@edit']);
        Route::get('/edit/{question_id?}/answer/{action?}/{answer_id?}', ['uses' => 'QuestionController@edit']);
        Route::post('/update/{id?}', ['uses' => 'QuestionController@update']);
        Route::get('/delete/{id?}', ['uses' => 'QuestionController@destroy']);
        Route::get('/index/all', ['uses' => 'QuestionController@indexAllQuestionsToElasticsearch']);
        Route::get('/cache/all', ['uses' => 'QuestionController@cacheAllQuestionsToRedis']);
        // add by tiemtt
        Route::post('/catedise', ['uses' => 'QuestionController@category_change']);
        Route::post('/addtags', ['uses' => 'QuestionController@add_tags']);
        Route::get('/search', ['uses' => 'QuestionController@search_page']);
        Route::post('/search', ['uses' => 'QuestionController@search']);
        // Quản trị câu hỏi nổi bật
        Route::get('/highlight/{id?}', ['uses' => 'QuestionController@highlight']);
        Route::post('/addHighlight', ['uses' => 'QuestionController@addHighlight']);
        Route::post('/removeHighlight', ['uses' => 'QuestionController@removeHighlight']);
        Route::post('/orderHighlight', ['uses' => 'QuestionController@orderHighlight']);
    });
    Route::group(['prefix' => 'frequently-answers', 'as' => 'q&a', 'middleware' => 'auth'], function () {
        Route::get('/', ['as' => 'index', 'uses' => 'AnswerController@index']);
        Route::get('/create', ['uses' => 'AnswerController@create']);
        Route::post('/store', ['uses' => 'AnswerController@store']);
        Route::get('/show/{id?}', ['uses' => 'AnswerController@show']);
        Route::get('/edit/{id?}', ['uses' => 'AnswerController@edit']);
        Route::post('/update/{id?}', ['uses' => 'AnswerController@update']);
        Route::get('/delete/{id?}', ['uses' => 'AnswerController@destroy']);
        Route::get('/index/all', ['uses' => 'AnswerController@indexAllAnswersToElasticsearch']);
    });
// Các trang tin tức
// Route cũ
    Route::group(['prefix' => 'posts', 'as' => 'posts', 'middleware' => 'auth'], function () {
        Route::get('/', ['as' => 'index', 'uses' => 'PostsController@index']);
        Route::get('/create/{type}', ['as' => 'create', 'uses' => 'PostsController@create']);
        Route::post('/store/{type}', ['as' => 'store', 'uses' => 'PostsController@store']);
        Route::get('/show/{id}', ['as' => 'show', 'uses' => 'PostsController@show']);
        Route::get('/edit/{id}', ['as' => 'edit', 'uses' => 'PostsController@edit']);
        Route::post('/update/{id}', ['as' => 'update', 'uses' => 'PostsController@update']);
        Route::get('/delete/{id}', ['as' => 'delete', 'uses' => 'PostsController@destroy']);
        Route::get('/preview/{id}', ['as' => 'preview', 'uses' => 'PostsController@preview']);
        Route::get('/search', ['as' => 'search', 'uses' => 'PostsController@search']);
        // Quản trị tin nổi bật
        Route::get('/highlight/{id?}', ['uses' => 'PostsController@highlight']);
        Route::post('/addHighlight', ['uses' => 'PostsController@addHighlight']);
        Route::post('/removeHighlight', ['uses' => 'PostsController@removeHighlight']);
        Route::post('/orderHighlight', ['uses' => 'PostsController@orderHighlight']);
        // Index all posts to elasticsearch
        Route::get('/index/all', ['uses' => 'PostsController@InsertAllPostElastic']);
        Route::get('/cache/all', ['uses' => 'PostsController@cacheAllPostsToRedis']);
    });
// Route mới
    Route::group(['prefix' => 'category/{categoryId?}/posts', 'as' => 'posts', 'middleware' => 'auth'], function () {
        Route::get('/', ['as' => 'index', 'uses' => 'PostsController@index']);
        Route::get('/create/{type}', ['as' => 'create', 'uses' => 'PostsController@create']);
        Route::post('/store/{type}', ['as' => 'store', 'uses' => 'PostsController@store']);
        Route::get('/show/{id}', ['as' => 'show', 'uses' => 'PostsController@show']);
        Route::get('/edit/{id}', ['as' => 'edit', 'uses' => 'PostsController@edit']);
        Route::post('/update/{id}', ['as' => 'update', 'uses' => 'PostsController@update']);
        Route::get('/delete/{id}', ['as' => 'delete', 'uses' => 'PostsController@destroy']);
        Route::get('/preview/{id}', ['as' => 'preview', 'uses' => 'PostsController@preview']);
        Route::get('/search', ['as' => 'search', 'uses' => 'PostsController@search']);
        // Quản trị tin nổi bật
        Route::get('/highlight/{id?}', ['uses' => 'PostsController@highlight']);
        Route::post('/addHighlight', ['uses' => 'PostsController@addHighlight']);
        Route::post('/removeHighlight', ['uses' => 'PostsController@removeHighlight']);
        Route::post('/orderHighlight', ['uses' => 'PostsController@orderHighlight']);
    });
// Đường dẫn allow upload ảnh từ trong ckeditor
    Route::post('ckeditor/image_upload', 'CKEditorController@upload')->name('upload');
// Trang quản trị role
    Route::group(['prefix' => 'roles', 'as' => 'role', 'middleware' => 'auth'], function () {
        Route::get('/', ['as' => 'index', 'uses' => 'RoleController@index']);
        Route::get('/create', ['uses' => 'RoleController@create']);
        Route::post('/store', ['uses' => 'RoleController@store']);
        Route::get('/show/{id?}', ['uses' => 'RoleController@show']);
        Route::get('/edit/{id?}', ['uses' => 'RoleController@edit']);
        Route::post('/update/{id?}', ['uses' => 'RoleController@update']);
        Route::get('/delete/{id?}', ['uses' => 'RoleController@destroy']);
    });
// Trang quản trị permission
    Route::group(['prefix' => 'permissions', 'as' => 'permission', 'middleware' => 'auth'], function () {
        Route::get('/', ['as' => 'index', 'uses' => 'PermissionController@index']);
        Route::get('/create', ['uses' => 'PermissionController@create']);
        Route::post('/store', ['uses' => 'PermissionController@store']);
        Route::get('/show/{id?}', ['uses' => 'PermissionController@show']);
        Route::get('/edit/{id?}', ['uses' => 'PermissionController@edit']);
        Route::post('/update/{id?}', ['uses' => 'PermissionController@update']);
        Route::get('/delete/{id?}', ['uses' => 'PermissionController@destroy']);
    });
// Quản lý phòng ban
    Route::group(['prefix' => 'departments', 'as' => 'departments', 'middleware' => 'auth'], function () {
        Route::get('/', ['as' => 'index', 'uses' => 'DepartmentController@index']);
        Route::post('/store', ['uses' => 'DepartmentController@store']);
        Route::get('/edit/{id?}', ['uses' => 'DepartmentController@edit']);
        Route::post('/update/{id?}', ['uses' => 'DepartmentController@update']);
        Route::get('/delete/{id?}', ['uses' => 'DepartmentController@destroy']);
    });
// Trang quản trị user
    Route::group(['prefix' => 'users', 'as' => 'user', 'middleware' => 'auth'], function () {
        Route::get('/', ['as' => 'index', 'uses' => 'UserController@index']);
        Route::get('/create', ['uses' => 'UserController@create']);
        Route::post('/store', ['uses' => 'UserController@store']);
        Route::get('/show/{id?}', ['uses' => 'UserController@show']);
        Route::get('/edit/{id?}', ['uses' => 'UserController@edit']);
        Route::post('/update/{id?}', ['uses' => 'UserController@update']);
        Route::get('/delete/{id?}', ['uses' => 'UserController@destroy']);
    });
// Trang quản trị template
    Route::group(['prefix' => 'templates', 'as' => 'template', 'middleware' => 'auth'], function () {
        Route::get('/', ['as' => 'index', 'uses' => 'TemplateController@index']);
        Route::post('/store', ['uses' => 'TemplateController@store']);
        Route::get('/show/{id?}', ['uses' => 'TemplateController@show']);
        Route::get('/edit/{id?}', ['uses' => 'TemplateController@edit']);
        Route::post('/update/{id?}', ['uses' => 'TemplateController@update']);
        Route::get('/delete/{id?}', ['uses' => 'TemplateController@destroy']);
        Route::get('/getdatapost', ['uses' => 'TemplateController@getDataPost']);
        Route::get('/getallpost', ['uses' => 'TemplateController@getAllPost']);
        Route::get('/getproduct', ['uses' => 'TemplateController@getProduct']);
        Route::get('/getproducts', ['uses' => 'TemplateController@getProducts']);

        Route::get('/bannertop', ['uses' => 'HomepageController@getBannerTop']);
        Route::post('/bannertop', ['uses' => 'HomepageController@postBannerTop']);
        Route::get('/delete/bannertop/{id}', ['uses' => 'HomepageController@deleteBannerTop']);
        Route::match(['get', 'post'], '/sectionbds', ['uses' => 'HomepageController@sectionbds']);
        Route::match(['get', 'post'], '/sectionpartner', ['uses' => 'HomepageController@sectionpartner']);

        Route::match(['get', 'post'], '/bannerleft', ['uses' => 'HomepageController@bannerLeft']);
        Route::match(['get', 'post'], '/sectionhd', ['uses' => 'HomepageController@sectionhd']);
        Route::match(['get', 'post'], '/sectionttnb', ['uses' => 'HomepageController@sectionttnb']);
        Route::match(['get', 'post'], '/sectionhdcg', ['uses' => 'HomepageController@sectionhdcg']);
        Route::match(['get', 'post'], '/sectionstb', ['uses' => 'HomepageController@sectionstb']);

        Route::match(['get', 'post'], '/sectionseo', ['uses' => 'HomepageController@sectionseo']);
    });
// Quản trị menu
    Route::group(['prefix' => 'menu', 'as' => 'menu', 'middleware' => 'auth'], function () {
        Route::get('/', ['as' => 'index', 'uses' => 'MenuController@index']);
        Route::post('/store', ['uses' => 'MenuController@store']);
        Route::get('/edit/{id?}', ['uses' => 'MenuController@edit']);
        Route::post('/update/{id?}', ['uses' => 'MenuController@update']);
        Route::get('/delete/{id?}', ['uses' => 'MenuController@destroy']);
        Route::post('/order', ['uses' => 'MenuController@order']);
    });
// Quản trị thông tin website
    Route::group(['prefix' => 'contact', 'as' => 'settings', 'middleware' => 'auth'], function () {
        Route::get('/', ['as' => 'index', 'uses' => 'SettingController@contact']);
        Route::post('/store', ['uses' => 'SettingController@storeContact']);
    });
    Route::post('/html/update', ['uses' => 'SettingController@updateHTML']);

// QUẢN TRỊ BANNER >> TIEMTT
    Route::group(['prefix' => 'banner',], function () {
        Route::get('/', ['as' => 'index', 'uses' => 'BannersController@index']);
        Route::post('/store', ['uses' => 'BannersController@store']);
        Route::get('/show/{id?}', ['uses' => 'BannersController@show']);
        Route::get('/edit/{id?}', ['uses' => 'BannersController@edit']);
        Route::post('/edit/{id?}', ['uses' => 'BannersController@update']);
        Route::get('/delete/{id?}', ['uses' => 'BannersController@destroy']);
        Route::get('/search', ['uses' => 'BannersController@search_form']);
        Route::post('/search', ['uses' => 'BannersController@search_submit']);
    });
    Route::group(['prefix' => 'category-banner',], function () {
        Route::get('/', ['as' => 'index', 'uses' => 'CategoryHasBannerController@index']);
        Route::get('/show/{id?}', ['uses' => 'CategoryHasBannerController@show']);
        Route::get('/edit/{id?}', ['uses' => 'CategoryHasBannerController@edit']);
        Route::post('/edit/{id?}', ['uses' => 'CategoryHasBannerController@update']);

        Route::match(['get', 'post'], '/bannertop', ['uses' => 'TemplateController@banner_top_categories']);
        Route::match(['get', 'post'], '/bannerleft', ['uses' => 'TemplateController@banner_left_categories']);
    });

// Tài khoản của tôi
    Route::group(['prefix' => 'account'], function () {
        Route::match(array('GET', 'POST'), '/profile', ['uses' => 'MyAccountController@profile']);
    });
});
