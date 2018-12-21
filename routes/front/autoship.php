<?php
/**
 * Author: R.j
 * Date: 2018-12-21 10:32
 * File: autoship.php
 */
Route::resource('autoships', 'AutoshipController');
Route::get('autoships/invoice', 'AutoshipController@invoice')->name('autoships.invoice');