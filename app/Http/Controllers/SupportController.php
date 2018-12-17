<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function faq()
    {
        return view('support.faq');
    }

    public function contact()
    {
        return view('support.contact');
    }
}