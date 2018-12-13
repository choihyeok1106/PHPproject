<?php

namespace App\Http\Controllers;


use App\Cache\Cache;
use App\Cache\RankCache;
use App\Models\HomeInterface;
use App\Repositories\Rep;
use App\Services\AuthenticateService;
use App\Services\RankService;
use App\Services\RepService;
use App\Supports\UserPrefs;

class HomeController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('home.index');
    }

}
