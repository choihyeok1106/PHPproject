<?php
/**
 * Created by PhpStorm.
 * User: hook0
 * Date: 2018-11-07
 * Time: 14:50
 */

namespace App\Supports;


use App\Repositories\Rep;

class UserPrefs {

    const FIELD = 'user';

    /**
     * @param Rep $user
     */
    public static function set($user) {
        $_SESSION[self::FIELD] = $user;
    }

    public static function clear() {
        session_unset($_SESSION[self::FIELD]);
    }

    public static function isLogin() {
        return isset($_SESSION[self::FIELD]);
    }

    public static function get($key) {
        $val = null;
        if (self::isLogin()) {
            /** @var Rep $user */
            $user = $_SESSION[self::FIELD];
            if (isset($user[$key])) {
                $val = $user[$key];
            }
        }
        return $val;
    }

}