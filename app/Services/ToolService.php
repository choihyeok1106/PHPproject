<?php
/**
 * Author: hyeokchoi
 * Date: 21/12/2018 5:40 PM
 * File: ToolService.php
 */

namespace App\Services;


class ToolService extends Service
{
    public static function getLibrary() {
        return Service::make(UserPrefs::pass())->get("/v1/vbo/tools");
    }

}