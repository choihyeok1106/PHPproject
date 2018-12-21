<?php
/**
 * Author: R.j
 * Date: 2018-12-21 10:18
 * File: home.php
 */

// Home Ajax
Route::get('/a/home/new-alert', 'Ajax\HomeAjax@newAlert');
Route::get('/a/home/interface', 'Ajax\HomeAjax@getInterface');
Route::post('/a/home/interface', 'Ajax\HomeAjax@setInterface');
Route::post('/a/home/interface-sorting', 'Ajax\HomeAjax@sortingInterface');
Route::get('/a/home/banners', 'Ajax\HomeAjax@banners');
Route::get('/a/home/summaries', 'Ajax\HomeAjax@summaries');
Route::get('/a/home/news', 'Ajax\HomeAjax@news');
Route::get('/a/home/team-alerts', 'Ajax\HomeAjax@teamAlerts');
Route::get('/a/home/tracker', 'Ajax\HomeAjax@tracker');
Route::get('/a/home/schedules', 'Ajax\HomeAjax@schedules');
Route::get('/a/home/activities', 'Ajax\HomeAjax@activities');
Route::get('/a/home/communities', 'Ajax\HomeAjax@communities');