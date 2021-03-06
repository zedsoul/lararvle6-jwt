<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::prefix('users')->group(function (){
    Route::post('login','userController@login');  //用户登录
    Route::post('registed','userController@registed');  //用户注册
    Route::post('again','userController@again');  //修改用户密码

});
Route::middleware('role:admin','RefreshToken')->group(function () {

});
Route::prefix('admin')->group(function (){
    Route::post('login','adminController@login');  //用户登录
    Route::post('registered','adminController@registered');  //用户注册
    Route::post('again','adminController@again');  //重置用户密码
});
