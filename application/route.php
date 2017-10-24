<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------


//Route::rule('路由表达式'，'路由地址'，‘请求类型’，‘路由参数（数组）’，‘变量规则（数组）’);
//GET ,POST ,DELETE ,PUT ,*
//Route::rule('hello','sample/Test/hello','GET|POST|PUT',['https'=>false]);
//这里传一个:version 来控制版本号
//TP5 路由查找是顺序查找 如果匹配到第一个地址，就不会进入第二个地址。这时候便需要限制规则

use think\Route;

//Banner

Route::get('api/:version/banner/:id', 'api/:version.Banner/getBanner');

//专题
Route::group('api/:version/theme', function () {
    Route::get('', 'api/:version.Theme/getSimpleList');
    Route::get('/:id', 'api/:version.Theme/getComplexOne');
});

//商品
Route::group('api/:version/product', function () {
    Route::get('/by_category', 'api/:version.Product/getAllInCategory');
    Route::get('/:id', 'api/:version.Product/getOne', [], ['id' => '\d+']);
    Route::get('/recent', 'api/:version.Product/getRecent');
});


//分类
Route::get('api/:version/category/all', 'api/:version.Category/getAllCategories');


//Token
Route::post('api/:version/token/user', 'api/:version.Token/getToken');

//用户地址
Route::post('api/:version/address', 'api/:version.Address/createOrUpdateAddress');

//订单

Route::post('api/:version/order', 'api/:version.Order/placeOrder');

//订单分页
Route::post('api/:version/order/by_user', 'api/:version.Order/getSummaryByUser');

// 获取某一个订单详情
Route::get('api/:version/order/:id', 'api/:version.Order/getDetail',[],['id' => '\d+']);
// 微信支付
Route::post('api/:version/pay/pre_order', 'api/:version.Pay/getPreOrder');

// 微信回调通知接口
Route::post('api/:version/pay/notify', 'api/:version.Pay/receiveNotify');

//Route::post('api/:version/pay/re_notify', 'api/:version.Pay/redirectNotify');


//测试接口

Route::get('api/:version/second', 'api/:version.Address/second');
Route::get('api/:version/third', 'api/:version.Address/third');