<?php
/**
 * Author: R.j
 * Date: 2018-12-11 15:01
 * File: RankService.php
 */

namespace App\Services;


class RepRankService {

    /**
     * @param string $fields
     * @return Service
     */
    public static function getRanks(string $fields = '') {
        return Service::make()->get("/v1/vbo/ranks?fields={$fields}");
    }

}