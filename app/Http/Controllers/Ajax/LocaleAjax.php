<?php
/**
 * Author: R.j
 * Date: 2018-12-26 10:15
 * File: LocaleAjax.php
 */

namespace App\Http\Controllers\Ajax;


use App\Cache\LocaleCache;
use Illuminate\Support\Facades\Config;

class LocaleAjax extends AjaxController {

    /**
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function index() {
        $locales                   = LocaleCache::getLocales();
        $locales['meta']['locale'] = Config::get('app.locale');
        return $this->ok($locales);
    }

}