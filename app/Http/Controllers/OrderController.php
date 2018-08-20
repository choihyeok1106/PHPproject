<?php

namespace App\Http\Controllers;

use App\Repositories\Item;
use Illuminate\Http\Request;
use App\Service\ItemService;

class OrderController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('orders.index');
    }
    public function show($orderId){
        return view('orders.show');
    }
}