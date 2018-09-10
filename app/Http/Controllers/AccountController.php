<?php
/**
 * Created by PhpStorm.
 * User: hyeokchoi
 * Date: 2018. 8. 21.
 * Time: PM 2:22
 */

namespace App\Http\Controllers;


use App\Service\RepService;

class AccountController extends Controller
{
    public function index(){
        $repNumber = 'US100030';

        $rep_service = new RepService();
        $rep = $rep_service->getRep($repNumber);

        return view('account.profile',['rep'=>$rep]);
    }
}