<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

Route::get('think', function () {
 return 'hello,ThinkPHP5!';
});

Route::get('/', 'index/index');

Route::get('hello/:name', 'index/hello');

Route::get("admin$", "admin/Index/index");

Route::get("admin/index/homea", "admin/Index/homea");
Route::get("admin/index/homeb", "admin/Index/homeb");
Route::get("admin/index/homeland", "admin/Index/homeland");
Route::get("admin/index/console", "admin/Index/console");
Route::get("admin/news/index", "admin/News/index");
Route::get('admin/news/getdata', "admin/News/getdata");
Route::post('admin/user/update', 'admin/User/update');
Route::post('admin/upload/upload', 'admin/Upload/upload');
Route::get('admin/upload/update', 'admin/Upload/update');
Route::get("admin/login/logout", "admin/Login/logout");
Route::post("admin/login/checklogin", "admin/Login/checklogin");

Route::get("login$", "admin/Login/index");

Route::get("admin/Login/makecode", "admin/Login/makecode");

Route::get("admin/user", "admin/User/index");

Route::miss('index/err');

return [];
