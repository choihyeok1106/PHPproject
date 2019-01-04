<?php
/**
 * Author: R.j
 * Date: 2018-12-21 10:25
 * File: item.php
 */

// Item Ajax
Route::get('/a/item', 'Ajax\ItemAjax@index');
Route::get('/a/item/categories', 'Ajax\ItemAjax@categories');
Route::get('/a/item/{sku}', 'Ajax\ItemAjax@item');
Route::get('/a/item/{sku}/stocks', 'Ajax\ItemAjax@stocks');
Route::get('/a/item/{sku}/price', 'Ajax\ItemAjax@price');
Route::get('/a/item/{sku}/resource', 'Ajax\ItemAjax@resource');
Route::get('/a/item/{sku}/options', 'Ajax\ItemAjax@options');
Route::get('/a/item/{sku}/relates', 'Ajax\ItemAjax@relates');