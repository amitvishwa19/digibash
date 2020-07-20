
<?php

Route::get('/','App\AppController@index')->name('home');
Route::get('/product/{product}','App\AppController@product')->name('product');
Route::get('/products/category/{category}','App\AppController@category_products')->name('category.products');
Route::get('/cart','App\AppController@cart')->name('cart');
Route::get('/cart/add/{product}','App\AppController@add_to_cart')->name('cart.item.add');
Route::get('/cart/delete/{productid}','App\AppController@delete_item_from_cart')->name('cart.item.delete');
Route::get('/cart/delete','App\AppController@delete_cart')->name('cart.delete');
Route::get('/cart/checkout','App\AppController@checkout')->name('cart.checkout');

//Route::get('/{product}','App\DigishopController@home')->name('home');
// Route::get('/{page}','App\AppController@page')->name('page');
// Route::get('/','Client\ClientController@home')->name('home');
// Route::get('/cart','Client\ClientController@cart')->name('cart');
// Route::get('/account','Client\ClientController@account')->name('account');
// Route::get('/checkout','Client\ClientController@checkout')->name('checkout');
// Route::get('/posts','Client\ClientController@posts')->name('posts');
// Route::get('/post/{post}','Client\ClientController@post')->name('posts.single');
// Route::get('/product/{product}','Client\ClientController@product')->name('product.single');


//Route::get('/', function () {
	//app('log')->debug(app_setting('app_name'));
	//return setting('app.name');
	//return $this->digizigs();
	//return menu('Main Menu');
	//return url()->current();
	//return route('mail.index');

	// //Digizigs::test();
	// //digizigs()->test();
	// //$value = Cache::forever('item', 'wola');
	// return Cache::get('item');;
	// // dd(config('settings.app_name'));
	// // return '<h1>Home Page</h1>';
	// // //$name = AppConfig::get_value('app_description');//get_value('app_name');//get_value('app_name');
	// // //return $name;
	// // //AppConfig::set_setting('app_name','digizigs');

	// // $setting = Settings::get('app_description');
	// // dd($setting);
	// // config(['TEST' => 'NEW_VALUE']);
	// // return config('TEST');
//})->name('app.home');

//Auto Deploy from github push
Route::post('/deploy/github', 'Admin\GithubDeployController@deploy');

//Auth Route
Auth::routes();


Route::prefix('appadmin')->middleware('auth')->group(base_path('routes/admin.php'));

//Admin Routes
    Route::group(['prefix' => 'appadmin','middleware'=>['auth']],function(){

    //Admin
    Route::get('/', 'Admin\DashboardController@index')->name('app.admin.home');

    //Posts
    Route::resource('/post','Admin\PostController');

    // //Posts
    // Route::get('/post',[
    //     'as' => 'posts',
    //     'uses' => 'PostController@index'
    // ]);



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
    Route::resource('/activity','Admin\ActivityLogController');
    Route::get('/log','Admin\LogController@index')->name('app.admin.log');

    //Ecommerce
    Route::resource('/shop','Admin\ShopController');
    Route::resource('/product','Admin\ProductController');

});
