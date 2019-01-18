<?php
/**
 * Author: R.j
 * Date: 2019-01-14 12:08
 * File: AddressService.php
 */

namespace App\Services;


class AddressService {

    /**
     * @param int $type
     * @param int $customer
     * @return Service
     */
    public static function addresses(int $customer = 0, int $type = 0) {
        return Service::make()->get("/v1/vbo/address?type={$type}&customer={$customer}");
    }
}