<?php
/**
 * Author: R.j
 * Date: 2018-12-21 10:24
 * File: test.php
 */

Route::get('/test', 'TestController@index');

Route::get('/test1', function (){
    return view('tools.library');
});

?>