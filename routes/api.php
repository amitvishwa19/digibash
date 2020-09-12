<?php

use Illuminate\Http\Request;



// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });



Route::group(['prefix' => 'v1'],function(){

    //Auth Check
	Route::post('/auth/register', 'Api\v1\AuthController@register');
    Route::post('/auth/login', 'Api\v1\AuthController@login');
    Route::get('/auth/user', 'Api\v1\AuthController@user');
    Route::post('/auth/logout', 'Api\v1\AuthController@logout');
    Route::post('/auth/refresh', 'Api\v1\AuthController@refresh');
    Route::post('/auth/me', 'Api\v1\AuthController@me');

    //Post Auth
    Route::get('/user/posts','Api\v1\PostController@index')->middleware('auth:api');
    Route::get('/user/post/{id}','Api\v1\PostController@show')->middleware('auth:api');
    Route::post('/user/post','Api\v1\PostController@store')->middleware('auth:api');
    Route::put('/user/post','Api\v1\PostController@store')->middleware('auth:api');
    Route::delete('/user/post/{id}','Api\v1\PostController@destroy')->middleware('auth:api');

});
