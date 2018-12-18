<?php
/**
 * Author: R.j
 * Date: 2018-12-12 14:29
 * File: RankCache.php
 */

namespace App\Cache;


use App\Services\RankService;

class RankCache {
    /**
     * @return \App\Repositories\Rank[]
     */
    public static function getRanks() {
        $key   = "rank";
        $ranks = Cache::get($key);
        if (!$ranks) {
            $svc = RankService::getRanks();
            return Cache::set($key, $svc->items());
        }
        return $ranks;
    }
}