<?php
/**
 * Author: R.j
 * Date: 2018-12-11 15:01
 * File: RankService.php
 */

namespace App\Services;


use App\Supports\UserPrefs;

class RankService {

    /**
     * @return Service
     */
    public static function getRanks() {
        return Service::make(UserPrefs::pass())->get("/v1/vbo/ranks");
    }

}