<?php
/**
 * Created by PhpStorm.
 * User: hook0
 * Date: 2018-11-22
 * Time: 14:58
 */

namespace App\Cache;


use App\Demos\HomeData;
use App\Repositories\Content;
use App\Services\NewsService;
use App\Supports\UserPrefs;

class HomeCache {

    /**
     * @return array
     */
    public static function getNews() {
        $key  = UserPrefs::getCountryLow() . ':home:news';
        $news = Cache::get($key);
        if (!$news) {
            $svc = NewsService::getLatest(3);
            return Cache::set($key, $svc->response());
        }
        return $news;
    }

}