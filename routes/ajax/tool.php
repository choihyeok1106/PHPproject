<?php
/**
 * Author: hyeokchoi
 * Date: 26/12/2018 9:56 AM
 * File: tool.php
 */

Route::get('/a/tools/library', 'Ajax\ToolAjax@libraries');
Route::get('/a/tools/library/categories', 'Ajax\ToolAjax@categories');
