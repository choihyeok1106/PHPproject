<?php

namespace App\Http\Controllers;

use App\Service\ItemService;
use Illuminate\Http\Request;

class ProductController extends Controller {
    private $service;

    /**
     * Display a listing of the resource.
     *
     */
    public function __construct() {
        $this->middleware('auth');
        $this->service = new ItemService();
    }

    public function index() {
        $categories = $this->service->getCategories();
        return view('products.index',
            [
                'categories' => $categories,
            ]);
    }

    public function show($skuId) {

        return view('products.show', ['skuid' => $skuId]);
    }
}
