<?php

//products
Route::get('/','Digishop\Client\ProductController@index')->name('home');
Route::get('/product/{product}','Digishop\Client\ProductController@product')->name('product');
Route::get('/products/category/{category}','Digishop\Client\ProductController@category_products')->name('category.products');


//Account
Route::get('/account',[
    'uses' => 'Digishop\Client\AccountController@index',
    'as' =>'account.dashboard'
]);


//cart
//Route::group(['prefix' => 'cart','middleware'=>['auth']],function(){
Route::group(['prefix' => 'cart','middleware'=>['auth']],function(){

    Route::get('/','Digishop\Client\CartController@cart')->name('cart');
    Route::get('/add/{product}','Digishop\Client\CartController@add_item')->name('cart.item.add');
    Route::get('/delete/{productid}','Digishop\Client\CartController@remove_item')->name('cart.item.delete');
    Route::get('/delete','Digishop\Client\CartController@delete_cart')->name('cart.delete');
    Route::post('/applycoupon','Digishop\Client\CartController@applyCouponCode')->name('cart.applycoupon');
    Route::get('/checkout','Digishop\Client\CartController@checkout')->name('cart.checkout');
    Route::post('/payment','Digishop\Client\CartController@payment')->name('cart.payment');
    Route::get('/payment/status','Digishop\Client\CartController@paymen_status')->name('cart.payment.status');
    Route::get('/payment/paytm','Digishop\Client\CartController@paytm_payment')->name('cart.payment.paytm');
    Route::post('/payment/paytm/status', 'Digishop\Client\CartController@paytm_payment_callback')->name('cart.payment.paytm.status');
});


//Admin
Route::group(['prefix' => 'admin','middleware'=>['auth']],function(){

    Route::get('/', 'Digishop\Admin\DashboardController@index')->name('app.admin.home');
    Route::resource('/brand','Digishop\Admin\BrandController');
    Route::resource('/coupon','Digishop\Admin\CouponController');
    Route::resource('/shop','Digishop\Admin\ShopController');
    Route::resource('/product','Digishop\Admin\ProductController');
    Route::resource('/order','Digishop\Admin\OrderController');

});

