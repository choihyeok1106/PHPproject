<?php

namespace App\Http\Controllers;

use App\Service\ItemService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $item_service;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->item_service = new ItemService();
    }

    public function index()
    {
        $items = $this->item_service->getCategories();
        return view('products.index',['items'=>$items]);
    }

    public function show($skuId)
    {

        return view('products.show',['skuid'=>$skuId]);
    }
}
