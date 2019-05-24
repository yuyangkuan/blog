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

Route::get('admin', function () {
    return view('welcome',['name'=>'于洋宽']);
});

Route::get('/goods','GoodsController@index');

//表单提交
// Route::get('/goods',function(){
//     echo "<form action='/form' method='post'><input type='text' name='nn'>".csrf_field()."<button>提交</button></form>";
// });

// Route::post('/form',function(){
//     return request()->nn;
// });

//实验正则
// Route::get('index/{id}/{name}',function($id,$name){
//     echo $id;
//     echo $name;
// })->where('id','\d+')->where('name','\d+');

//可选参数
// Route::get('index/{id?}',function($id=0){
//     return $id;
// });

//重定向
//Route::redirect('/herf','/hello');
//品牌
Route::prefix('/brand')->middleware('checklogin')->group(function(){
    Route::get('add','BrandController@create');
    Route::post('doadd','BrandController@doadd');
    Route::get('list','BrandController@index');
    Route::get('upd','BrandController@edit');
    Route::post('doupd','BrandController@doupd');
    Route::get('del','BrandController@destroy');
});
//商品
Route::prefix('/goods')->middleware('checklogin')->group(function(){
    Route::get('list','GoodsController@index');
    Route::post('doadd','GoodsController@doadd');
    Route::get('add','GoodsController@add');
    Route::get('del','GoodsController@del');
});
//管理员
Route::prefix('/admin')->middleware('checklogin')->group(function(){
    Route::get('list','AdminController@list');
    Route::post('doadd','AdminController@doadd');
    Route::get('add','AdminController@add');
});

//商品分类
Route::prefix('/cate')->middleware('checklogin')->group(function(){
    Route::get('add','CateController@add');
    Route::get('list','CateController@list');
    Route::post('doadd','CateController@doadd');
});

//ajax添加图片未做完
Route::prefix('/class')->group(function(){
    Route::get('add','ClassController@add');
    Route::get('list','ClassController@list');
    Route::post('doadd','ClassController@doadd');
});

//考试
Route::prefix('/news')->middleware('checklogin')->group(function(){
    Route::get('add','NewsController@add');
    Route::get('list','NewsController@list');
    Route::post('doadd','NewsController@doadd');
    Route::post('doupdate','NewsController@doupdate');
    Route::get('update','NewsController@update');
    Route::post('del','NewsController@del');
    Route::post('unique','NewsController@unique');
});

//前台
Route::prefix('/reg')->group(function(){
    Route::get('add','Index\RegController@add');//注册
    Route::get('user','Index\RegController@user');//个人中心
    Route::post('doadd','Index\RegController@doadd');//执行注册
    Route::post('code','Index\RegController@code');//短信发送
});

Route::get('/login/login','Index\LoginController@login');//登陆
Route::post('dologin','Index\LoginController@dologin');//执行登陆
Route::get('list','Index\ListController@list');//购物车列表
Route::get('proinfo','Index\IndexController@proinfo');//商品详情


Route::get('/email',function(){
echo "<form action='/form' method='post'><input type='text' name='email'><input type='text' name='password'>".csrf_field()."<button>发送</button></form>";
});

Route::post('form','BrandController@sendemail');

//登陆和注册
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/','Index\IndexController@index');