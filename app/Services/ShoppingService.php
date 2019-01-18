<?php
/**
 * Author: R.j
 * Date: 2019-01-08 14:57
 * File: ShoppingService.php
 */

namespace App\Services;


use App\Criterias\ItemsCriteria;
use App\Criterias\ShippingCriteria;

class ShoppingService {

    public static function items(ItemsCriteria $c) {
        return Service::make()->get("/v1/vbo/shopping/items", $c->items());
    }

    public static function shippings(ShippingCriteria $c) {
        return Service::make()->post("/v1/vbo/shopping/shippings", $c->methods());
    }

    public static function payments() {
        return Service::make()->get("/v1/vbo/shopping/payments");
    }

}