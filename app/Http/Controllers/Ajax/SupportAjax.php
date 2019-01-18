<?php
/**
 * Author: hyeokchoi
 * Date: 16/01/2019 8:54 PM
 * File: SupportAjax.php
 */

namespace App\Http\Controllers\Ajax;


use App\Cache\SupportCache;
use App\Services\SupportService;
use Illuminate\Http\Request;

class SupportAjax extends AjaxController
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function faqs(Request $request)
    {
        if ($request->ajax()) {
            $faqs = SupportCache::getFaq();
            return $this->ok($faqs);
        }
        return $this->bad_request();
    }

    public function contact(Request $request)
    {
        $validator = \Validator::make($request->all(),
            [
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required|max:13',
                'content' => 'required'
            ]
        );

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->messages()]);
        }
        if ($request->ajax()) {
            $name = $request->get("name");
            $email = $request->get("email");
            $phone = $request->get("phone");
            $content = $request->get("content");
            $svc = SupportService::store($name, $email, $phone, $content);

            if (!$svc->succeed()) {
                return $this->no($svc->error());
            }
            return $this->ok($svc->body());
        }
        return $this->bad_request();
    }

    public function company(Request $request)
    {
        if ($request->ajax()) {
            $company = $this->companySorting(SupportCache::getCompany());
            return $this->ok($company);
        }
        return $this->bad_request();
    }

    public function companySorting($data)
    {
        $arr = [];
        foreach ($data as $key => $value) {
            if($key == 'data'){
                foreach($value as $v){
                    $arr[$v['country']][] = $v;
                }
            }
        }
        return $arr;
    }
}