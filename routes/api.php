<?php

use Illuminate\Http\Request;

//管理平台
Route::group([
    'prefix' => 'manage',
    'as' => 'manage.',
    'namespace' => 'Manage',
], function () {
    #认证
    Route::post('auth/pwdLogin', 'AuthController@pwdLogin')->name('auth.pwdLogin');
    #管理员
    Route::post('user/list','UserController@list')->name('user.list');
    Route::post('user/detail','UserController@detail')->name('user.detail');
    Route::post('user/add','UserController@add')->name('user.add');
    Route::post('user/update','UserController@update')->name('user.update');
    Route::post('user/delete','UserController@delete')->name('user.delete');
    #用户
    Route::post('member/list','MemberController@list')->name('member.list');
    Route::post('member/detail','MemberController@detail')->name('member.detail');
    Route::post('member/delete','MemberController@delete')->name('member.delete');
    Route::post('member/isAvailable','MemberController@isAvailable')->name('member.isAvailable');
    #商品分类
    Route::post('goods-category/list','GoodsCategoryController@list')->name('goods-category.list');
    Route::post('goods-category/treeList','GoodsCategoryController@treeList')->name('goods-category.treeList');
    Route::post('goods-category/detail','GoodsCategoryController@detail')->name('goods-category.detail');
    Route::post('goods-category/add','GoodsCategoryController@add')->name('goods-category.add');
    Route::post('goods-category/update','GoodsCategoryController@update')->name('goods-category.update');
    Route::post('goods-category/delete','GoodsCategoryController@delete')->name('goods-category.delete');
});
//客户端
Route::group([
    'prefix' => 'client',
    'as' => 'client.',
    'namespace' => 'Client',
], function () {
    #认证
    Route::post('auth/pwdLogin', 'AuthController@pwdLogin')->name('auth.pwdLogin');
    #用户
    Route::post('member/detail','MemberController@detail')->name('member.detail');
    Route::post('member/add','MemberController@add')->name('member.add');
    Route::post('member/update','MemberController@update')->name('member.update');

});