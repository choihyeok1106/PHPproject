<?php
/**
 * Author: R.j
 * Date: 2019-01-10 17:54
 * File: ShippingCache.php
 */

namespace App\Cache;


use App\Services\ShippingService;

class ShippingCache {

    /**
     * @return array
     */
    public static function methods() {
        $key        = Cache::key(':shipping:methods');
        $categories = Cache::get($key);
        if (!$categories) {
            $svc = ShippingService::methods();
            return Cache::set($key, $svc->response());
        }
        return $categories;
    }

}