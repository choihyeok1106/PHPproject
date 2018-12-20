<?php
/**
 * Author: R.j
 * Date: 2018-12-20 18:09
 * File: RepCache.php
 */

namespace App\Cache;


use App\Services\RepService;

class RepCache {

    /**
     * @param string $repNumber
     * @return array
     */
    public static function getRep(string $repNumber) {
        $key   = ":rep:{$repNumber}";
        $ranks = Cache::get($key);
        if (!$ranks) {
            $svc = RepService::getRep($repNumber);
            return Cache::set($key, $svc->data());
        }
        return $ranks;
    }

}