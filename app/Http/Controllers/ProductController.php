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
        //        dd(Cache::get('us:products:0:id:desc:1'));
        //        dd(Cache::keys());
        //        Cache::clear();
        return view('products.index', ['cat' => $cat]);
    }

    //    public function show($skuId) {
    //        return view('products.show', ['skuid' => $skuId]);
    //    }
}
