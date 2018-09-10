<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('commissions.index');
    }

    public function show($commissionId){
        return view('commissions.show',['commissionId'=>$commissionId]);
    }
}
