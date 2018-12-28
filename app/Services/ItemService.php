<?php
/**
 * Author: R.j
 * Date: 2018-12-27 14:37
 * File: ItemService.php
 */

namespace App\Services;


use App\Supports\UserPrefs;

class ItemService {

    public static function getCategories() {
        return Service::make(UserPrefs::pass())->get("/v1/vbo/items/categories");
    }

    public static function getItems() {
        return Service::make(UserPrefs::pass())->get("/v1/vbo/items");
    }

}