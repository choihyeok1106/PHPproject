<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeamController extends Controller {

    public function dashboard() {
        return view('team.dashboard');
    }
}