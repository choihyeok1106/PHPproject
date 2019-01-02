<?php
/**
 * Author: R.j
 * Date: 2018-12-28 16:08
 * File: RequestTrait.php
 */

namespace App\Supports;


trait Requests {

    /**
     * @param string $key
     * @param null   $deft
     * @return mixed
     */
    function _request(string $key, $deft = null) {
        return request()->get($key, $deft);
    }

    /**
     * @param string $key
     * @param int    $deft
     * @param null   $min
     * @param null   $max
     * @return int|mixed|string
     */
    function int(string $key, int $deft = 0, $min = null, $max = null) {
        $val = $this->_request($key);
        if (!is_numeric($val)) {
            $val = $deft;
        }
        $val = intval($val);
        if (is_numeric($min) && $val < intval($min)) {
            $val = intval($min);
        }
        if (is_numeric($max) && $val > intval($max)) {
            $val = intval($max);
        }
        return $val;
    }

    /**
     * @param string $name
     * @param string $deft
     * @return string
     */
    function string(string $name, string $deft = '') {
        $val = $this->_request($name);
        if (!is_string($val)) {
            $val = $deft;
        }
        return trim($val);
    }

    /**
     * @param null $key
     * @param null $deft
     * @return mixed
     */
    public function header($key = null, $deft = null) {
        return app('request')->header($key, $deft);
    }

}