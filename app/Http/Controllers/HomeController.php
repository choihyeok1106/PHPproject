<?php

namespace App\Http\Controllers;


use App\Services\FaqService;
use App\Supports\UserPrefs;

class HomeController extends Controller {


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('home.index')->with(['interfaces' => UserPrefs::homeInterfaces()]);
    }

}
