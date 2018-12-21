<?php
/**
 * Author: R.j
 * Date: 2018-12-21 10:27
 * File: home.php
 */

Route::get('/',
    function () {
        return redirect('/home');
    });

Route::resource('home', 'HomeController');