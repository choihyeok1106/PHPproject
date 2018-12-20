<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GenealogyController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function binary() {
        return view('genealogy.binary');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sponsor() {
        return view('genealogy.sponsor');
    }
}
