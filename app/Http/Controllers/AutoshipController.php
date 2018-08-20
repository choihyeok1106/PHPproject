<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AutoshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('autoships.index');
    }


    //add new profile
    public function profile()
    {
        return view('autoships.profile');
    }

    //list
    public function show(Request $orderId){
        return view('autoships.show',['orderId'=>$orderId]);
    }
}
