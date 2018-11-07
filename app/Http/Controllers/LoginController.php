<?php

namespace App\Http\Controllers;


use App\Supports\UserAccess;

class LoginController extends Controller {
    public function index() {
        if (UserAccess::isLogin()) {
            return redirect('/');
        }
        return view('login.index');
    }
}
