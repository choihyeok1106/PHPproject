<?php
/**
 * Author: R.j
 * Date: 2018-12-17 11:41
 * File: NewsService.php
 */

namespace App\Services;


use App\Supports\UserPrefs;

class NewsService {

    /**
     * @param int $limit
     * @return Service
     */
    public static function getLatest(int $limit) {
        return Service::make(UserPrefs::pass())->get("/v1/vbo/news?limit={$limit}");
    }

    /**
     * @param int $page
     * @return Service
     */
    public static function getNews($page = 1) {
        return Service::make(UserPrefs::pass())->get("/v1/vbo/news?page={$page}");
    }

}