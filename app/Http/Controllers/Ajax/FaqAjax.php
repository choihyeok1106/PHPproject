<?php
/**
 * Created by PhpStorm.
 * User: hyeokchoi
 * Date: 14/12/2018
 * Time: 2:57 PM
 */

namespace App\Http\Controllers\Ajax;


use App\Cache\FaqCache;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FaqAjax extends Controller
{
    use Ajax;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function faqs(Request $request)
    {
        if ($request->ajax()) {
            $faqs = FaqCache::getFaq();
            return $this->ok($faqs);
        }
        return $this->badRequest();
    }
}
