<?php


Route::get('/','Client\DigiShopController@index')->name('home');
Route::get('/product/{product}','Client\DigiShopController@product')->name('product');
Route::get('/products/category/{category}','Client\DigiShopController@category_products')->name('category.products');

Route::group(['prefix' => 'cart','middleware'=>['auth']],function(){

    Route::get('/','Client\digishop\CartController@cart')->name('cart');
    Route::get('/add/{product}','Client\digishop\CartController@add_to_cart')->name('cart.item.add');
    Route::get('/delete/{productid}','Client\digishop\CartController@delete_item_from_cart')->name('cart.item.delete');
    Route::get('/delete','Client\digishop\CartController@delete_cart')->name('cart.delete');
    Route::get('/checkout','Client\digishop\CartController@checkout')->name('cart.checkout');

});

