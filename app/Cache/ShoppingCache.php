<?php
/**
 * Author: R.j
 * Date: 2019-01-16 20:34
 * File: ShoppingCache.php
 */

namespace App\Cache;


use App\Services\ShoppingService;

class ShoppingCache {

    /**
     * @return array
     */
    public static function payments() {
        $key        = Cache::key(':payments');
        $payments = Cache::get($key);
        if (!$payments) {
            $svc = ShoppingService::payments();
            return Cache::set($key, $svc->data());
        }
        return $payments;
    }

}