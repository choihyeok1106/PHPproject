<?php
/**
 * Author: R.j
 * Date: 2019-01-03 14:09
 * File: TestController.php
 */

namespace App\Http\Controllers;


class TestController extends Controller {

    public function index() {
        return view('test.index');
    }

}