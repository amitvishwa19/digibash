<?php


Route::get('/','Client\DigiShopController@index')->name('home');
Route::get('/product/{product}','Client\DigiShopController@product')->name('product');
Route::get('/products/category/{category}','Client\DigiShopController@category_products')->name('category.products');

Route::group(['prefix' => 'cart','middleware'=>['auth']],function(){

    Route::get('/','Client\DigiShop\CartController@cart')->name('cart');
    Route::get('/add/{product}','Client\DigiShop\CartController@add_to_cart')->name('cart.item.add');
    Route::get('/delete/{productid}','Client\DigiShop\CartController@delete_item_from_cart')->name('cart.item.delete');
    Route::get('/delete','Client\DigiShop\CartController@delete_cart')->name('cart.delete');
    Route::get('/checkout','Client\DigiShop\CartController@checkout')->name('cart.checkout');

});

