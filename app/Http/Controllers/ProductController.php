<?php

namespace App\Http\Controllers;

use App\Service\ItemService;
use Illuminate\Http\Request;

class ProductController extends Controller {

    /**
     * Display a listing of the resource.
     *
     */
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('products.index');
    }

    public function show($skuId) {
        return view('products.show', ['skuid' => $skuId]);
    }
}
