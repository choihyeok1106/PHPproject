<?php
/**
 * Author: R.j
 * Date: 2018-12-19 14:36
 * File: GenealogyCache.php
 */

namespace App\Cache;


use App\Services\GenealogyService;

class GenealogyCache {

    /**
     * @param string $repNumber
     * @return array
     */
    public static function getBinary(string $repNumber) {
        $key  = ":genealogy:{$repNumber}";
        $news = Cache::get($key);
        if (!$news) {
            $svc = GenealogyService::getBinary($repNumber);
            return Cache::set($key, $svc->data());
        }
        return $news;
    }

}