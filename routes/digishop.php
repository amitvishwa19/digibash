<?php


Route::get('/','Client\DigiShopController@index')->name('home');
Route::get('/product/{product}','Client\DigiShopController@product')->name('product');
Route::get('/products/category/{category}','Client\DigiShopController@category_products')->name('category.products');
Route::get('/cart','Client\DigiShopController@cart')->name('cart');
Route::get('/cart/add/{product}','Client\DigiShopController@add_to_cart')->name('cart.item.add');
Route::get('/cart/delete/{productid}','Client\DigiShopController@delete_item_from_cart')->name('cart.item.delete');
Route::get('/cart/delete','Client\DigiShopController@delete_cart')->name('cart.delete');
Route::get('/cart/checkout','Client\DigiShopController@checkout')->name('cart.checkout');
