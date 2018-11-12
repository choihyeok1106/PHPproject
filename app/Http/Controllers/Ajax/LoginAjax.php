<?php
/**
 * Created by PhpStorm.
 * User: hook0
 * Date: 2018-11-07
 * Time: 10:36
 */

namespace App\Http\Controllers\Ajax;


use App\Http\Controllers\Controller;
use App\Service\RepService;
use App\Supports\UserAccess;
use App\Supports\UserPrefs;
use Illuminate\Http\Request;

class LoginAjax extends Controller {

    /**
     * Ajax response Rep Login
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request) {
        if ($request->ajax()) {
            //            session()->put('locale', $locale);
            $id       = $request->get("id");
            $pwd      = $request->get("pwd");
            $remember = $request->get("remember") ? true : false;

            $rep = RepService::Make()->login($id, $pwd);

            if ($rep) {
                UserPrefs::set($rep);
                return response(["message" => "ok"]);
            }

            return response(["error" => "This username/password combination is not quite correct"]);
        }
        return response(["error" => "Bad Request"]);
    }

    /**
     * Ajax response Rep Forgot password
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function forgotPassword(Request $request) {
        if ($request->ajax()) {
            return response(["error" => "Bad Request"]);
        }
        return response(["error" => "Bad Request"]);
    }

}