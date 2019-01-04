<?php

namespace App\Http\Controllers;

use App\Repositories\Items;
use Illuminate\Http\Request;
use App\Services\ItemService;

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
    public function show(){
        return view('orders.show');
    }
    public function invoice(){
        return view('orders.invoice');
    }
}
