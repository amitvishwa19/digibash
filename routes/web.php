
<?php

use Illuminate\Support\Facades\Cache;






/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () { 

	//$value = Cache::forever('item', 'wola');
	return Cache::get('item');;
	// dd(config('settings.app_name'));
	// return '<h1>Home Page</h1>';
	// //$name = AppConfig::get_value('app_description');//get_value('app_name');//get_value('app_name');
	// //return $name;
	// //AppConfig::set_setting('app_name','digizigs');

	// $setting = Settings::get('app_description');
	// dd($setting);
	// config(['TEST' => 'NEW_VALUE']);
	// return config('TEST');
 });

Route::get('/test', function () {  
	$test = TestFcd::TestFunction();
	//return $test->TestFunction();
	//sTestFcd::TestFunction(); 
	//return $test->TestFunction();

	return $test;
});

Route::post('/subscribe','Admin\SubscriptionController@store')->name('app.web.subscribe');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Admin Routes
Route::group(['prefix' => 'appadmin','middleware'=>['auth']],function(){

    //Admin
	Route::get('/', 'Admin\DashboardController@index')->name('app.admin.home');

	//Posts
	Route::resource('/post','Admin\PostController');

	//Pages
	Route::resource('/page','Admin\PageController');

	//Categoty
	Route::resource('/category','Admin\CategoryController');

	//Menu
	Route::post('/menu/{action?}','Admin\MenuController@selectMenu')->name('menu.select');
	Route::resource('/menu','Admin\MenuController');


	//Themes
	Route::resource('/theme','Admin\ThemeController');


	//Calender
	Route::get('/calendar', 'Admin\CalendarController@index')->name('app.admin.calendar');


    //Mail
    Route::resource('/mail','Admin\MailController');

    //Settings
    Route::resource('/setting','Admin\SettingController');

    //Logs
    Route::get('/log','Admin\LogController@index')->name('app.admin.log');    

    
});
