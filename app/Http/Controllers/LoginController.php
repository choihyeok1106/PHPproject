<?php

namespace App\Http\Controllers;


use App\Supports\UserPrefs;
use Illuminate\Support\Facades\Config;

class LoginController extends Controller {

    public $skipActions = 'all';

    public function index() {
        if (UserPrefs::login()) {
            return redirect('/');
        }

        return view('login.index');
    }

    public function logout() {
        UserPrefs::clear();
        return redirect()->back();
    }
}
