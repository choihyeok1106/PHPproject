<?php

namespace App\Http\Controllers;


use App\Models\HomeInterface;
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
        /** @var HomeInterface $interface */
        $interface = HomeInterface::find(UserPrefs::get('id'));
        return view('home.index')->with('interface', $interface);
    }

}
