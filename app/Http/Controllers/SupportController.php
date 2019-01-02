<?php

namespace App\Http\Controllers;


class SupportController extends Controller
{
    public function faqs()
    {
        return view('support.faqs');
    }

    public function contact()
    {
        return view('support.contact');
    }
}