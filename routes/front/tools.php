<?php
/**
 * Author: R.j
 * Date: 2018-12-21 10:36
 * File: tools.php
 */

Route::get('/tools/library', 'ToolController@library')->name('tools.library');
Route::get('/tools/calendar', 'ToolController@calendar')->name('tools.calendar');