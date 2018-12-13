<?php
/**
 * Author: R.j
 * Date: 2018-12-12 14:29
 * File: RankCache.php
 */

namespace App\Cache;


use App\Services\RepRankService;

class RepRankCache {

    /**
     * @param string $fields
     * @return \App\Repositories\Rank[]
     */
    public static function getRanks(string $fields) {
        $key   = "rank:{$fields}";
        $ranks = Cache::get($key);
        if (!$ranks) {
            $svc = RepRankService::getRanks($fields);
            if ($svc->succeed()) {
                $ranks = $svc->result();
                Cache::set($key, $ranks);
            }
        }
        return $ranks;
    }

}