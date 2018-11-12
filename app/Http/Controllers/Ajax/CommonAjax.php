<?php
/**
 * Created by PhpStorm.
 * User: hook0
 * Date: 2018-11-09
 * Time: 13:51
 */

namespace App\Http\Controllers\Ajax;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommonAjax extends Controller {

    public function cartCount(Request $request) {
        $count = 0;
        if ($request->ajax()) {
            $count = 3;
        }
        return response(['count' => $count]);
    }

    public function alertCount(Request $request) {
        $count = 0;
        if ($request->ajax()) {
            $count = 7;
        }
        return response(['count' => $count]);
    }

    public function messageCount(Request $request) {
        $count = 0;
        if ($request->ajax()) {
            $count = 0;
        }
        return response(['count' => $count]);
    }

}