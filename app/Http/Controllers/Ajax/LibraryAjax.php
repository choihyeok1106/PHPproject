<?php
/**
 * Author: hyeokchoi
 * Date: 21/12/2018 5:11 PM
 * File: LibraryAjax.php
 */

namespace App\Http\Controllers\Ajax;


use App\Http\Controllers\Controller;

class LibraryAjax extends Controller
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