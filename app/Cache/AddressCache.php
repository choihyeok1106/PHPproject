<?php
/**
 * Author: R.j
 * Date: 2019-01-14 12:09
 * File: AddressCache.php
 */

namespace App\Cache;


use App\Constants\UserType;
use App\Services\AddressService;
use App\Supports\UserPrefs;

class AddressCache {

    /**
     * @param int $type
     * @param int $customer
     * @return array
     */
    public static function addresses(int $customer = 0, int $type = 0) {
        if ($customer > 0) {
            $user_type = UserType::CUSTOMER;
            $user_id   = $customer;
        } else {
            $user_type = UserType::REP;
            $user_id   = UserPrefs::number();
        }

        $key       = Cache::key(":addresses:{$user_id}:{$user_type}", false);
        $addresses = Cache::get($key);
        if (!$addresses) {
            $svc = AddressService::addresses($customer,$type);
            return Cache::set($key, $svc->response());
        }
        return $addresses;
    }

}