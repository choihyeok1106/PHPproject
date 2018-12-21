<?php
/**
 * Author: R.j
 * Date: 2018-12-21 10:35
 * File: login.php
 */

Route::resource('login', 'LoginController');
Route::get('/logout', 'LoginController@logout')->name('login.logout');