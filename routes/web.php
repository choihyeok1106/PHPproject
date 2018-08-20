<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::resource('autoship','AutoshipController');
Route::resource('commissions','CommissionController');
Route::resource('dashboard','DashboardController');
Route::resource('enrollment','EnrollmentController');
Route::resource('genealogy','GenealogyController');
Route::resource('home','HomeController');
Route::resource('orders','OrderController');
Route::resource('products','ProductController');
Route::resource('reports','ReportController');
Route::get('support/faq','SupportController@faq')->name('support.faq');
Route::get('support/contact','SupportController@contact')->name('support.contact');
Route::get('tools/library','ToolController@library')->name('tools.faq');
Route::get('tools/calendar','ToolController@calendar')->name('tools.contact');
