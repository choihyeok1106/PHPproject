<?php
/**
 * Created by PhpStorm.
 * User: hyeokchoi
 * Date: 2018. 8. 17.
 * Time: AM 11:23
 */

namespace App\Services;

use App\Repositories\Rep;
use App\Supports\APIResources;
use App\Supports\UserPrefs;

class RepService extends Service {

    /**
     * @param string $repNumber
     * @return Service
     */
    public static function getRep(string $repNumber) {
        return Service::make(UserPrefs::pass())->get("/v1/vbo/reps/{$repNumber}");
    }
}