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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix' => 'v1'],function(){
	Route::post('/user/login', 'Api\v1\AuthController@login');
	Route::post('/user/register', 'Api\v1\AuthController@register');
	Route::get('/users','Api\v1\AuthController@users')->middleware('auth:api');
});