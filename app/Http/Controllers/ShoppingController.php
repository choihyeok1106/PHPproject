<?php
/**
 * Created by PhpStorm.
 * User: hyeokchoi
 * Date: 2018. 8. 22.
 * Time: PM 3:01
 */

namespace App\Http\Controllers;


class ShoppingController extends Controller
{
    public function cart(){
        return view('shopping.cart');
    }

    public function checkout(){
        return view('shopping.checkout');
    }

    public function complete(){
        return view('shopping.complete');
    }
}