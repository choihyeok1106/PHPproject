<?php
/**
 * Author: R.j
 * Date: 2018-12-21 10:34
 * File: shopping.php
 */

Route::resource('orders', 'OrderController');
Route::resource('products', 'ProductController');


// product
Route::get('products/{cat}', 'ProductController@index');
Route::get('product/{sku}', 'ProductController@show');
Route::get('/invoice', 'OrderController@invoice')->name('orders.invoice');
// shopping
Route::get('/shopping/cart', 'ShoppingController@cart')->name('shopping.cart');
Route::get('/shopping/checkout', 'ShoppingController@checkout')->name('shopping.checkout');
Route::get('/shopping/complete', 'ShoppingController@complete')->name('shopping.complete');