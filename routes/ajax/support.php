<?php
/**
 * Author: hyeokchoi
 * Date: 21/12/2018 5:07 PM
 * File: support채.php
 */

Route::get('/a/support/faqs', 'Ajax\FaqAjax@faqs');
Route::post('/a/support/contact', 'Ajax\supportAjax@contact')->name('support.contact');
