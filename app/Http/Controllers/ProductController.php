<?php

namespace App\Http\Controllers;


use App\Cache\Cache;

class ProductController extends Controller {

    /**
     * Display a listing of the resource.
     *
     */
    public function __construct() {
        $this->middleware('auth');
    }

    public function index($cat = '') {
        return view('products.index', ['cat' => $cat]);
    }

    public function show($sku) {
        return view('products.show', ['sku' => $sku]);
    }
}
