<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function faqs()
    {
        return view('support.faqs');
    }

    public function contact()
    {
        return view('support.contact');
    }
}