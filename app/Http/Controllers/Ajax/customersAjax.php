<?php
/**
 * Created by PhpStorm.
 * User: ea947
 * Date: 2019-01-07
 * Time: 오후 2:52
 */

namespace App\Http\Controllers\Ajax;


class customersAjax extends AjaxController
{
    public function index() {
        return view('customers.index');
    }
}