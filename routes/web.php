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

Route::get('/','HomeController@index')->name('route_FontEnd_Home');
//FontEnd

Route::get('/news','HomeController@news')->name('route_FontEnd_News_List');
Route::get('/lands','HomeController@lands')->name('route_FontEnd_Lands_List');
Route::get('/news/details/{id}','HomeController@news_detail')->name('route_FontEnd_News_Detail');
Route::get('/lands/details/{id}','HomeController@lands_detail')->name('route_FontEnd_Lands_Detail');
Route::post('/lands/details/{id}','HomeController@lands_email')->name('route_FontEnd_Lands_Email');
//Login
Route::get('/login', ['as'=>'login','uses'=>'App\Http\Controllers\Auth\LoginController@getlogin']);
Route::post('/login', ['as'=>'login','uses'=>'App\Http\Controllers\Auth\LoginController@postlogin']);
Route::get('/logout', ['as'=>'logout','uses'=>'App\Http\Controllers\Auth\LoginController@getlogout']);
//BackEnd
Route::middleware(['auth'])->group(function (){

    //Users
    Route::get('/admin/users','AdminController@index')->name('route_BackEnd_Users_List');
    Route::match(['get','post'],'/admin/users/add', 'AdminController@add')->name('route_BackEnd_Users_Add');
    Route::get('/admin/users/detail/{id}', 'AdminController@detail')->name('route_BackEnd_Users_Detail');
    Route::post('/admin/users/update/{id}', 'AdminController@update')->name('route_BackEnd_Users_Update');
    Route::get('/admin/users/remove/{id}', 'AdminController@remove')->name('route_BackEnd_Users_Remove');

    //Category_lands
    Route::get('/admin/categorylands','App\Http\Controllers\Admin\LandsController@categorylands')->name('route_BackEnd_Categorylands_List');
    Route::match(['get','post'],'/admin/category/add', 'App\Http\Controllers\Admin\LandsController@categorylands_add')->name('route_BackEnd_Categorylands_Add');
    Route::get('/admin/categorylands/detail/{id}', 'App\Http\Controllers\Admin\LandsController@categorylands_detail')->name('route_BackEnd_Categorylands_Detail');
    Route::post('/admin/categorylands/update/{id}', 'App\Http\Controllers\Admin\LandsController@categorylands_update')->name('route_BackEnd_Categorylands_Update');
    Route::get('/admin/categorylands/remove/{id}', 'App\Http\Controllers\Admin\LandsController@categorylands_remove')->name('route_BackEnd_Categorylands_Remove');

    //Lands
    Route::get('/admin/lands','App\Http\Controllers\Admin\LandsController@lands')->name('route_BackEnd_Lands_List');
    Route::match(['get','post'],'/admin/lands/add', 'App\Http\Controllers\Admin\LandsController@lands_add')->name('route_BackEnd_Lands_Add');
    Route::get('/admin/lands/detail/{id}', 'App\Http\Controllers\Admin\LandsController@lands_detail')->name('route_BackEnd_Lands_Detail');
    Route::post('/admin/lands/update/{id}', 'App\Http\Controllers\Admin\LandsController@lands_update')->name('route_BackEnd_Lands_Update');
    Route::get('/admin/lands/remove/{id}', 'App\Http\Controllers\Admin\LandsController@lands_remove')->name('route_BackEnd_Lands_Remove');

    //Banner
    Route::get('/admin/banner','App\Http\Controllers\Admin\BannerController@banner')->name('route_BackEnd_Banner_List');
    Route::match(['get','post'],'/admin/banner/add', 'App\Http\Controllers\Admin\BannerController@banner_add')->name('route_BackEnd_Banner_Add');
    Route::get('/admin/banner/detail/{id}', 'App\Http\Controllers\Admin\BannerController@banner_detail')->name('route_BackEnd_Banner_Detail');
    Route::post('/admin/banner/update/{id}', 'App\Http\Controllers\Admin\BannerController@banner_update')->name('route_BackEnd_Banner_Update');
    Route::get('/admin/banner/remove/{id}', 'App\Http\Controllers\Admin\BannerController@banner_remove')->name('route_BackEnd_Banner_Remove');

    //News
    Route::get('/admin/news','App\Http\Controllers\Admin\NewsController@news')->name('route_BackEnd_News_List');
    Route::match(['get','post'],'/admin/news/add', 'App\Http\Controllers\Admin\NewsController@news_add')->name('route_BackEnd_News_Add');
    Route::get('/admin/news/detail/{id}', 'App\Http\Controllers\Admin\NewsController@news_detail')->name('route_BackEnd_News_Detail');
    Route::post('/admin/news/update/{id}', 'App\Http\Controllers\Admin\NewsController@news_update')->name('route_BackEnd_News_Update');
    Route::get('/admin/news/remove/{id}', 'App\Http\Controllers\Admin\NewsController@news_remove')->name('route_BackEnd_News_Remove');
});



