<?php

//Frontend
Route::get('/',function(){
    return 'matrimony';
});



//Backend
Route::group(['prefix'=>'admin','as'=>'admin.'], function(){
    Route::get('/', function(){
        return 'Admin';
    });
});
