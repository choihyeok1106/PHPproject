<?php
/**
 * Author: R.j
 * Date: 2018-12-21 10:26
 * File: shopping.php
 */

// Shopping Ajax
Route::get('/a/cart/items', 'Ajax\CartAjax@items');
Route::post('/a/cart/add', 'Ajax\CartAjax@add');
Route::post('/a/cart/update', 'Ajax\CartAjax@update');
Route::post('/a/cart/delete', 'Ajax\CartAjax@delete');
Route::post('/a/cart/totals', 'Ajax\CartAjax@totals');
Route::post('/a/cart/checkout', 'Ajax\CartAjax@checkout');

Route::get('/a/checkout/shippings', 'Ajax\CheckoutAjax@shippings');
Route::get('/a/checkout/items/{id}', 'Ajax\CheckoutAjax@items');