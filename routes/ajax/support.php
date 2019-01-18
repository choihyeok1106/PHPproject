<?php
/**
 * Author: hyeokchoi
 * Date: 21/12/2018 5:07 PM
 * File: support채.php
 */

Route::get('/a/support/faqs', 'Ajax\SupportAjax@faqs');
Route::get('/a/support/company', 'Ajax\SupportAjax@company');
Route::post('/a/support/contact', 'Ajax\SupportAjax@contact')->name('support.contact');
