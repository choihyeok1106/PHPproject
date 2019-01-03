<?php
/**
 * Author: R.j
 * Date: 2018-12-21 10:34
 * File: shopping.php
 */


// shopping
Route::get('/shopping/cart', 'ShoppingController@cart')->name('shopping.cart');
Route::get('/shopping/checkout', 'ShoppingController@checkout')->name('shopping.checkout');
Route::get('/shopping/complete', 'ShoppingController@complete')->name('shopping.complete');

// product
Route::get('/shopping', 'ItemController@index')->name('item.index');
Route::get('/shopping/{sku}', 'ItemController@view')->name('item.view');
Route::get('/invoice', 'OrderController@invoice')->name('orders.invoice');