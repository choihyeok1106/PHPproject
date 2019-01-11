<?php
/**
 * Author: R.j
 * Date: 2018-12-19 15:31
 * File: Convertor.php
 */

namespace App\Supports;


class Converter {

    /**
     * @param array  $arr
     * @param string $cls
     * @return array|object|null
     */
    public static function convert($arr, $cls) {

        if ($arr && $cls && is_array($arr) && class_exists($cls)) {
            if (isset($arr[0])) {
                $data = [];
                foreach ($arr as $v) {
                    $data[] = self::convert($v, $cls);
                }
                return $data;
            } else {
                $obj = new $cls();
                if (method_exists($obj, 'setRawAttributes')) {
                    $obj->setRawAttributes($arr);
                } else {
                    foreach ($arr as $k => $v) {
                        $obj->$k = $v;
                    }
                }
                return $obj;
            }
        }
        return null;
    }

}