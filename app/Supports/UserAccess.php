<?php
/**
 * Created by PhpStorm.
 * User: hook0
 * Date: 2018-11-07
 * Time: 14:50
 */

namespace App\Supports;


class UserAccess {

    const FIELD = 'user';

    public static function set($user) {
        session()->put(self::FIELD, $user);
    }

    public static function isLogin() {
        return session()->has(self::FIELD);
    }

}