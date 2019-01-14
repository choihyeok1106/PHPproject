<?php
/**
 * Author: R.j
 * Date: 2019-01-14 17:33
 * File: address.php
 */
Route::get('/a/address', 'Ajax\AddressAjax@index');
Route::get('/a/address/default', 'Ajax\AddressAjax@default');