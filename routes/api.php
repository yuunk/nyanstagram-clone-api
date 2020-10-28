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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['api']], function () {
    Route::post('/signup', 'api\UserController@signup');
    Route::post('/user/check', 'api\UserController@check');
    Route::post('/user/logout', 'api\UserController@logout');
    Route::post('/auth/login', 'Auth\LoginController@login')->name('login');
    Route::post('/post', 'api\PostController@index');

    Route::group(['middleware' => ['jwt.auth']], function () {
        Route::get('/auth/user', 'Auth\LoginController@checkUser');
        Route::get('/auth/logout', 'Auth\LoginController@logout');
    });
});
