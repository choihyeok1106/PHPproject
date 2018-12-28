<?php

namespace App\Http\Controllers;



class ItemController extends Controller {

    /**
     * Display a listing of the resource.
     *
     */
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('item.index');
    }

    public function show($sku) {
        return view('item.show', ['sku' => $sku]);
    }
}
