<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ToolController extends Controller
{
    public function library()
    {
        return view('tools.library');
    }

    public function calendar()
    {
        return view('tools.calendar');
    }
}