<?php
/**
 * Author: R.j
 * Date: 2018-12-26 10:18
 * File: LocaleService.php
 */

namespace App\Services;



class LocaleService {


    /**
     * @return Service
     */
    public static function getLocales() {
        return Service::make()->get("/v1/vbo/geographic/locales");
    }

}