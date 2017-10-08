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
});
//测试
Route::get('admin/test','Admin\LoginController@test');

Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){
    /*资源路由*/
    Route::resource('blog','BlogController');//博客管理
    Route::resource('cate','CateController');
});
/*文件上传*/
Route::get('admin/cates/upload','Admin\CateController@upload');
/*后台登录*/
Route::match(['get','post'],'admin/login','Admin\LoginController@login');
Route::match(['get','post'],'admin/out','Admin\LoginController@out');
/*公共的基类*/
Route::get('admin/common','Admin\CommonController@index');