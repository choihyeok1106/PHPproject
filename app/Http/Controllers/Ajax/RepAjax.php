<?php
/**
 * Created by PhpStorm.
 * User: hook0
 * Date: 2018-11-07
 * Time: 15:50
 */

namespace App\Http\Controllers\Ajax;


use App\Http\Controllers\Controller;

class RepAjax extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }
}