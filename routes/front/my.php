<?php
/**
 * Author: R.j
 * Date: 2018-12-21 10:27
 * File: business.php
 */

Route::resource('team', 'TeamController');
Route::resource('commissions', 'CommissionController');
Route::resource('reports', 'ReportController');
Route::resource('account', 'AccountController');