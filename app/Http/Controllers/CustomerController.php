<?php
/**
 * Author: hyeokchoi
 * Date: 08/01/2019 11:04 AM
 * File: CustomerController.php
 */

namespace App\Http\Controllers;


class CustomerController extends Controller
{

    public function index(){
        return view('customers.index');
    }
}