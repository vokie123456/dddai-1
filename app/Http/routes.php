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
//展示首页
// Route::get('/',function(){return view('./index'); });


Route::get('/','IndexController@index');


// 注册路由...
Route::get('auth/register','Auth\AuthController@getRegister');



Route::post('auth/register','Auth\AuthController@postRegister');

//登录认证...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login','Auth\AuthController@postLogin');

//注册成功 跳转到home用户中心
Route::get('home',function(){
    return view('home.index');
});

//退出...
Route::get('auth/logout','Auth\AuthController@getLogout');

//准备借款
// Route::get('jie',function(){return 'hello world'; });
Route::get('jie','ProController@jie');
Route::post('jie','ProController@jiePost');

//查看项目
Route::get('pro/{pid}','ProController@pro');

//投资
Route::post('touzi/{pid}','ProController@touzi');

//审核借款
Route::get('prolist','CheckController@prolist');

//审核列表页
Route::get('check/{pid}','CheckController@check');

//审核过程
Route::post('check/{pid}','CheckController@checkpost');

//运行,得到收益表 grows
Route::get('payrun','GrowController@run');

//借款人查看自己的账单表
Route::get('myzd','ProController@myzd');


//投资人查看自己的投资表
Route::get('mytz','ProController@mytz');

//投资人查看自己的收益表
Route::get('mysy','ProController@mysy');

//注册中间件
// Route::get('test', ['middleware'=>['App\Http\Middleware\EmailMiddleware'],function(){
// 	return 'test';
// }]);

//发邮件
Route::post('auth/register',
[ '
middleware'=>'App\Http\Middleware\EmailMiddleware',
'uses'=>'Auth\AuthController@postRegister'
]
);


//短信发送,生成短信验证码
Route::get('sm','IndexController@sm');