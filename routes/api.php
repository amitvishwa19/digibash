<?php

use Illuminate\Http\Request;



// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });



Route::group(['prefix' => 'v1'],function(){
	Route::post('/auth/register', 'Api\v1\AuthController@register');
    Route::post('/auth/login', 'Api\v1\AuthController@login');
    Route::post('/auth/logout', 'Api\v1\AuthController@logout');
    Route::post('/auth/refresh', 'Api\v1\AuthController@refresh');
    //Route::post('/auth/me', 'Api\v1\AuthController@me');
});
