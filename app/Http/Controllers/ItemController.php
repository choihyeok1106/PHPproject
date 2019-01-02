<?php

namespace App\Http\Controllers;



class ItemController extends Controller {

    public function index() {
        return view('item.index');
    }

    public function show($sku) {
        return view('item.show', ['sku' => $sku]);
    }
}
