<?php
/**
 * Author: R.j
 * Date: 2018-12-26 10:15
 * File: LocaleAjax.php
 */

namespace App\Http\Controllers\Ajax;


use App\Cache\LocaleCache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class LocaleAjax extends AjaxController {

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request) {
        if ($request->ajax()) {
            $locales                   = LocaleCache::getLocales();
            $locales['meta']['locale'] = Config::get('app.locale');
            return $this->ok($locales);
        }
        return $this->badRequest();
    }

}