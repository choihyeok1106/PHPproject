<?php
/**
 * Author: R.j
 * Date: 2018-12-21 10:24
 * File: login.php
 */

// Login Ajax
Route::post('/a/login', 'Ajax\LoginAjax@index');
Route::post('/a/forgot-password', 'Ajax\LoginAjax@forgotPassword');