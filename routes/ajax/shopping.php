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
Route::get('/a/shopping/promotions', 'Ajax\ShoppingAjax@promotions');