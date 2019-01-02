<?php

namespace App\Http\Controllers;


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