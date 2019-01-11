<?php
/**
 * Created by PhpStorm.
 * User: hook0
 * Date: 2018-11-07
 * Time: 10:36
 */

namespace App\Http\Controllers\Ajax;


use App\Repositories\Passport;
use App\Services\AuthenticateService;
use App\Services\RepService;
use App\Supports\UserPrefs;
use Illuminate\Http\Request;


class LoginAjax extends AjaxController {

    public $skipActions = 'all';

    /**
     * Ajax response Rep Login
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request) {
        //            session()->put('locale', $locale);
        $id       = trim($request->get("id"));
        $pwd      = trim($request->get("pwd"));
        $remember = $request->get("remember") ? true : false;
        if (!$id || !$pwd) {
            return $this->no("This username/password combination is not quite correct");
        }
        $svc = AuthenticateService::login($id, $pwd);
        if (!$svc->succeed()) {
            return $this->no($svc->error());
        }
        /** @var Passport $pass */
        $pass = Passport::Item($svc->data(),false);
        if ($pass) {
            UserPrefs::setPassport($pass);
            $svc = RepService::getRep($pass->number);
            if (!$svc->succeed()) {
                UserPrefs::clear();
                return $this->no($svc->error());
            }
            UserPrefs::setRep($svc->data());
            if ($remember) {
                cookieset('username', $pass->number, 60 * 24 * 30);
            } else {
                cookiedel('username');
            }
            return $this->ok();
        }

        return $this->no('This username/password combination is not quite correct');
    }

    /**
     * Ajax response Rep Forgot password
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function forgotPassword(Request $request) {
        return response(["error" => "Bad Request"]);
    }

}