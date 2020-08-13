<?php

//products
Route::get('/','Client\digishop\ProductController@index')->name('home');
Route::get('/product/{product}','Client\digishop\ProductController@product')->name('product');
Route::get('/products/category/{category}','Client\digishop\ProductController@category_products')->name('category.products');


//Account
Route::get('/account',[
        'uses' => 'Client\digishop\AccountController@index',
        'as' =>'account.dashboard'
    ]);


//cart
//Route::group(['prefix' => 'cart','middleware'=>['auth']],function(){
Route::group(['prefix' => 'cart','middleware'=>['auth']],function(){

    Route::get('/','Client\digishop\CartController@cart')->name('cart');
    Route::get('/add/{product}','Client\digishop\CartController@add_item')->name('cart.item.add');
    Route::get('/delete/{productid}','Client\digishop\CartController@remove_item')->name('cart.item.delete');
    Route::get('/delete','Client\digishop\CartController@delete_cart')->name('cart.delete');
    Route::post('/applycoupon','Client\digishop\CartController@applyCouponCode')->name('cart.applycoupon');
    Route::get('/checkout','Client\digishop\CartController@checkout')->name('cart.checkout');
    Route::post('/payment','Client\digishop\CartController@payment')->name('cart.payment');
    Route::get('/payment/status','Client\digishop\CartController@paymen_status')->name('cart.payment.status');
    Route::get('/payment/paytm','Client\digishop\CartController@paytm_payment')->name('cart.payment.paytm');
    Route::post('/payment/paytm/status', 'Client\digishop\CartController@paytm_payment_callback')->name('cart.payment.paytm.status');
});

