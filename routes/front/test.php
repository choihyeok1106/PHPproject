<?php
/**
 * Author: R.j
 * Date: 2018-12-21 10:24
 * File: test.php
 */

Route::get('/test', function () {
    return view ('customers.index');
});

Route::get('/test2', function () {
    return view ('customers.test');
});