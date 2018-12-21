<?php
/**
 * Author: R.j
 * Date: 2018-12-21 10:35
 * File: support.php
 */

Route::get('/support/faqs', 'SupportController@faqs')->name('support.faqs');
Route::get('/support/contact', 'SupportController@contact')->name('support.contact');