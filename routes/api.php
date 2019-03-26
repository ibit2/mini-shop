<?php

use Illuminate\Http\Request;

//C端
Route::group([
    'prefix' => 'consumer',
    'as' => 'consumer.',
    'namespace' => 'Consumer',
], function () {
    #认证
    Route::post('auth/pwd-login', 'AuthController@pwdLogin')->name('auth.pwdLogin');
    Route::post('auth/sms-login', 'AuthController@smsLogin')->name('auth.smsLogin');
    Route::post('auth/me', 'AuthController@me')->name('auth.me');
    Route::post('auth/update-me', 'AuthController@updateMe')->name('auth.updateMe');
    Route::post('auth/logout', 'AuthController@logout')->name('auth.logout');
    #商品分类
    Route::post('goods-category/list', 'GoodsCategoryController@list')->name('goods-category.list');
    Route::post('goods-category/tree-list', 'GoodsCategoryController@treeList')->name('goods-category.treeList');
    #商品
    Route::post('goods/list', 'GoodsController@list')->name('goods.list');
    Route::post('goods/detail', 'GoodsController@detail')->name('goods.detail');
    Route::group(['middleware'=>['auth:consumer']], function () {
        #用户购物车
        Route::post('member-cart/list', 'MemberCartController@list')->name('member-cart.list');


    });

});
//B端
Route::group([
    'prefix' => 'business',
    'as' => 'business.',
    'namespace' => 'Business',
], function () {
    #认证
    Route::post('auth/pwd-login', 'AuthController@pwdLogin')->name('auth.pwdLogin');
    Route::post('auth/sms-login', 'AuthController@smsLogin')->name('auth.smsLogin');
    Route::post('auth/me', 'AuthController@me')->name('auth.me');
    Route::post('auth/update-me', 'AuthController@updateMe')->name('auth.updateMe');
    Route::post('auth/logout', 'AuthController@logout')->name('auth.logout');

    Route::group(['middleware'=>['auth:business','jwtPayload']], function () {
        #商品分类
        Route::post('goods-category/list', 'GoodsCategoryController@list')->name('goods-category.list');
        Route::post('goods-category/tree-list', 'GoodsCategoryController@treeList')->name('goods-category.treeList');
        Route::post('goods-category/detail', 'GoodsCategoryController@detail')->name('goods-category.detail');
        Route::post('goods-category/add', 'GoodsCategoryController@add')->name('goods-category.add');
        Route::post('goods-category/update', 'GoodsCategoryController@update')->name('goods-category.update');
        Route::post('goods-category/delete', 'GoodsCategoryController@delete')->name('goods-category.delete');
        #商品
        Route::post('goods/list', 'GoodsController@list')->name('goods.list');
        Route::post('goods/detail', 'GoodsController@detail')->name('goods.detail');
        Route::post('goods/add', 'GoodsController@add')->name('goods.add');
        Route::post('goods/update', 'GoodsController@update')->name('goods.update');
        Route::post('goods/delete', 'GoodsController@delete')->name('goods.delete');
    });

});
//管理平台
Route::group([
    'prefix' => 'manage',
    'as' => 'manage.',
    'namespace' => 'Manage',
], function () {
    #认证
    Route::post('auth/pwd-login', 'AuthController@pwdLogin')->name('auth.pwdLogin');
    Route::post('auth/me', 'AuthController@me')->name('auth.me');
    Route::post('auth/update-me', 'AuthController@updateMe')->name('auth.updateMe');
    Route::post('auth/logout', 'AuthController@logout')->name('auth.logout');

    Route::group(['middleware'=>['auth:manage']], function () {
        #管理员
        Route::post('user/list', 'UserController@list')->name('user.list');
        Route::post('user/detail', 'UserController@detail')->name('user.detail');
        Route::post('user/add', 'UserController@add')->name('user.add');
        Route::post('user/update', 'UserController@update')->name('user.update');
        Route::post('user/delete', 'UserController@delete')->name('user.delete');
        Route::post('user/is-available', 'UserController@isAvailable')->name('user.isAvailable');
        #角色
        Route::post('role/list', 'RoleController@list')->name('role.list');
        Route::post('role/detail', 'RoleController@detail')->name('role.detail');
        Route::post('role/add', 'RoleController@add')->name('role.add');
        Route::post('role/update', 'RoleController@update')->name('role.update');
        Route::post('role/delete', 'RoleController@delete')->name('role.delete');
        #权限
        Route::post('permission/treeList', 'PermissionController@treeList')->name('permission.treeList');
        #商户
        Route::post('merchant/list', 'MerchantController@list')->name('merchant.list');
        Route::post('merchant/detail', 'MerchantController@detail')->name('merchant.detail');
        Route::post('merchant/add', 'MerchantController@add')->name('merchant.add');
        Route::post('merchant/update', 'MerchantController@update')->name('merchant.update');
        Route::post('merchant/delete', 'MerchantController@delete')->name('merchant.delete');
        Route::post('merchant/is-available', 'MerchantController@isAvailable')->name('merchant.isAvailable');
        #用户
        Route::post('member/list', 'MemberController@list')->name('member.list');
        Route::post('member/detail', 'MemberController@detail')->name('member.detail');
        Route::post('member/delete', 'MemberController@delete')->name('member.delete');
        Route::post('member/is-available', 'MemberController@isAvailable')->name('member.isAvailable');
    });

});