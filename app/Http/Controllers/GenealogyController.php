<?php

namespace App\Http\Controllers;


class GenealogyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function binary()
    {
        return view('genealogy.binary');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sponsor()
    {
        return view('genealogy.sponsor');
    }
}
