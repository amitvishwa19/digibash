<?php

//Admin
Route::get('/', 'Admin\DashboardController@index')->name('app.admin.home');

//Posts
Route::resource('/post','Admin\PostController');

//Access Controls
Route::resource('/user','Admin\UserController');
Route::resource('/permission','Admin\PermissionController');
Route::resource('/role','Admin\RoleController');

//Pages
Route::resource('/page','Admin\PageController');

//Categoty
Route::resource('/category','Admin\CategoryController');
Route::post('/category/order','Admin\CategoryController@order_item')->name('categories.order.item');


//Menu
Route::resource('/menu','Admin\MenuController');
Route::get('/menu/{menu}/builder','Admin\MenuController@builder')->name('menu.builder');
Route::post('/menu/{menu}/builder/order','Admin\MenuController@order_item')->name('menu.builder.order.item');
Route::get('/menu/{menu}/builder/create','Admin\MenuController@addMenuItem_create')->name('menu.item.create');
Route::post('/menu/{menu}/builder/create','Admin\MenuController@addMenuItem')->name('menu.item.add');
Route::get('/menu/{menu}/builder/{item}/edit','Admin\MenuController@editMenuItem')->name('menu.item.edit');
Route::put('/menu/{menu}/builder/{item}/edit','Admin\MenuController@updateMenuItem')->name('menu.item.update');
Route::delete('/menu/{menu}/builder/{item}/delete','Admin\MenuController@deleteMenuItem')->name('menu.item.delete');


//Media
Route::get('/media','Admin\MediaController@index')->name('media.index');

//Themes
Route::resource('/theme','Admin\ThemeController');

//Profile
Route::resource('/profile','Admin\ProfileController');

//Account
Route::resource('/account','Admin\AccountController');


//Calender
Route::get('/calendar', 'Admin\CalendarController@index')->name('app.admin.calendar');


//Mail
Route::resource('/mail','Admin\MailController');

//Settings
Route::resource('/setting','Admin\SettingController');

Route::resource('/test','Admin\TestController');

//Logs
Route::get('/activitylog','Admin\ActivityLogController@index')->name('app.admin.activity.log');
Route::get('/log','Admin\LogController@index')->name('app.admin.log');

//Ecommerce
Route::resource('/shop','Admin\ShopController');
Route::resource('/product','Admin\ProductController');
