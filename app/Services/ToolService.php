<?php
/**
 * Author: hyeokchoi
 * Date: 21/12/2018 5:40 PM
 * File: ToolService.php
 */

namespace App\Services;


use App\Supports\UserPrefs;

class ToolService extends Service

{
    public static function getLibrary(string $search = "") {
        return Service::make(UserPrefs::pass())->get("/v1/vbo/resources?search={$search}");
    }

    public static function getCategories() {
        return Service::make(UserPrefs::pass())->get("/v1/vbo/resources/categories");
    }
}