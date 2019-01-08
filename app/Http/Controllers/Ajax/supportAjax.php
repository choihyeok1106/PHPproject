<?php
/**
 * Author: hyeokchoi
 * Date: 03/01/2019 3:58 PM
 * File: supportAjax.php
 */

namespace App\Http\Controllers\Ajax;


use App\Services\SupportService;
use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;

class supportAjax extends AjaxController
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function contact(Request $request)
    {
        $validation = $request->validate(
            [
                'name' => 'required',
                'email' => 'email|required',
                'phone' => 'required|max:13',
                'content' => 'required'
            ]
        );
        if ($request->ajax()) {
            $name = $request->get("name");
            $email = $request->get("email");
            $phone = $request->get("phone");
            $content = $request->get("content");
            $svc = SupportService::store($name, $email, $phone, $content);
            if (!$svc->succeed()) {
                return $this->no($svc->error());
            }
            return $this->ok();
        }
        return $this->badRequest();
    }
}