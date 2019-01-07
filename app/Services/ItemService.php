<?php
/**
 * Author: R.j
 * Date: 2018-12-27 14:37
 * File: ItemService.php
 */

namespace App\Services;


use App\Criterias\ItemsCriteria;
use App\Supports\UserPrefs;

class ItemService {

    public static function categories() {
        return Service::make()->get("/v1/vbo/items/categories");
    }

    public static function item(string $sku) {
        return Service::make()->get("/v1/vbo/items/{$sku}");
    }

    public static function stocks(string $sku) {
        return Service::make()->get("/v1/vbo/items/{$sku}/stocks");
    }

    public static function search(ItemsCriteria $c) {
        return Service::make()->get("/v1/vbo/items", $c->vars());
    }

}