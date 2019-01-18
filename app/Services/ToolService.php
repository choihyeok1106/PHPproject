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
    public static function getLibrary($category,string $search,$limit) {
        return Service::make()->get("/v1/vbo/resources?search={$search}&category={$category}&limit={$limit}");
    }

    public static function getCategories() {
        return Service::make()->get("/v1/vbo/resources/categories");
    }
}