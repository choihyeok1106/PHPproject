<?php

namespace App\Http\Controllers;


use App\Supports\UserAccess;
use App\Supports\UserPrefs;

class LoginController extends Controller {

    public function index() {
        if (UserPrefs::isLogin()) {
            return redirect('/');
        }
        return view('login.index');
    }

    public function logout() {
        UserPrefs::clear();
        return redirect()->back();
    }
}
