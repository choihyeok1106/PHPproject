<?php
/**
 * Created by PhpStorm.
 * User: hook0
 * Date: 2018-11-19
 * Time: 10:44
 */

namespace App\Cache;


use App\Supports\UserPrefs;
use Illuminate\Support\Facades\Redis;

class Cache {

    /**
     * @param string $key
     * @param mixed  $val
     * @param int    $expire Seconds
     * @return mixed
     */
    public static function set($key, $val, $expire = 7200) {
        if (self::enable() && $val && !isset($val['error'])) {
            return Redis::set($key, json_encode($val), 'EX', $expire);
        }
        return $val;
    }

    /**
     * @param string $key
     */
    public static function del($key) {
        if (self::enable()) {
            Redis::del($key);
        }
    }

    /**
     * clear all memories
     */
    public static function clear() {
        if (self::enable()) {
            Redis::flushDB();
        }
    }

    /**
     * @return array
     */
    public static function keys() {
        if (self::enable()) {
            $redis = Redis::connection();
            return $redis->keys('*');
        }
        return [];
    }

    /**
     * @param string $key
     * @return mixed
     */
    public static function get($key) {
        if (self::enable()) {
            return json_decode(Redis::get($key), true);
        }
        return null;
    }

    /**
     * @return bool
     */
    public static function enable() {
        return env('REDIS', 0);
    }

    /**
     * @param mixed $fields
     * @param bool  $countryKey
     * @return string
     */
    public static function key($fields, $countryKey = true) {
        $keys = [];
        if ($countryKey) {
            $keys[] = UserPrefs::country();
        }
        if (is_string($fields)) {
            if (substr($fields, 0, 1) === ':') {
                $fields = substr($fields, 1);
            }
            $fields = explode(':', $fields);
        }
        if (is_array($fields)) {
            foreach ($fields as $field) {
                $keys[] = trim($field);
            }
        }
        return $keys ? ':' . implode(':', $keys) : '';
    }
}