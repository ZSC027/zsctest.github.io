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
//访问URL：127.0.0.2返回的是默认的laravel欢迎视图
/*Route::get('/', function () {
    return view('welcome');
});*/
//前台首页
Route::get('/', 'HomeController@index')->name('home');
//前台文章内容首页
Route::get('article/{id}','HomeController@detail');

Auth::routes();
//访问URL：127.0.0.2/home，交由控制器方法index()处理，该方法返回一个index.blade.php文件
Route::get('/home', 'HomeController@index')->name('home');

//2020-4-6
//路由组可以给组内路由一次性添加命名空间，URL前缀，域名限定，中间件等属性
Route::group(['middleware'=>'auth','namespace'=>'Admin','prefix'=>'admin'],function(){
	Route::get('/','HomeController@index');          //对应访问资源为127.0.0.2/admin，Admin/HomeController
    //按RESTful规范添加一条路由，处理所有的增、删、改、查请求
	Route::resource('articles','ArticleController');   //对应访问资源为127.0.0.2/admin/articles前缀的资源
});