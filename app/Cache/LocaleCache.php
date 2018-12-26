<?php
/**
 * Author: R.j
 * Date: 2018-12-26 10:18
 * File: LocaleCache.php
 */

namespace App\Cache;


use App\Repositories\Locale;
use App\Services\LocaleService;

class LocaleCache {

    /**
     * @return Locale[]
     */
    public static function getLocales() {
        $key     = Cache::key(':locale');
        $locales = Cache::get($key);
        if (!$locales) {
            $svc = LocaleService::getLocales();
            return Cache::set($key, $svc->response());
        }
        return $locales;
    }

}