<?php

namespace App\Http\Controllers;



class ItemController extends Controller {

    public function index() {
        return view('item.index');
    }

    public function view($sku) {
        return view('item.view', ['sku' => $sku]);
    }
}
