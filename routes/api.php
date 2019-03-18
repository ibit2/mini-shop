<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group([
    'prefix' => 'manage',
    'namespace' => 'Manage',
], function () {
    Route::post('pwdLogin', 'AuthController@pwdLogin');
    Route::apiResources([
        'users' => 'UserController',
        'roles' => 'RoleController',
        'goods-categories' => 'GoodsCategoryController',
    ]);
    Route::get('permissions', 'PermissionController@index');
});