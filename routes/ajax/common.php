<?php
/**
 * Author: R.j
 * Date: 2018-12-21 10:24
 * File: common.php
 */

// Common Ajax
Route::get('/a/common/lang', 'Ajax\CommonAjax@lang');
Route::get('/a/cart/count', 'Ajax\CartAjax@count');
Route::get('/a/common/notice-count', 'Ajax\CommonAjax@noticeCount');
Route::get('/a/common/alert-count', 'Ajax\CommonAjax@alertCount');
Route::get('/a/common/message-count', 'Ajax\CommonAjax@messageCount');