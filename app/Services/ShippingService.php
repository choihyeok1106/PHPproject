<?php
/**
 * Author: R.j
 * Date: 2019-01-10 17:54
 * File: ShippingService.php
 */

namespace App\Services;


class ShippingService {

    /**
     * @return Service
     */
    public static function methods() {
        return Service::make()->get("/v1/vbo/shipping/methods");
    }

}