<?php
/**
 * Created by PhpStorm.
 * User: yoonpooh
 * Date: 2018. 6. 19.
 * Time: PM 4:31
 */

namespace App\Repositories;


trait Repository {

    /**
     * @param array $obj
     * @param mixed $fields
     * @return $this
     */
    function make(array $obj, $fields = null) {
        if (is_string($fields)) {
            $fields = explode(',', $fields);
        }
        if (is_array($obj) && $obj) {
            foreach ($obj as $key => $val) {
                if (is_array($fields) && isset($fields[$key])) {
                    $key = $fields[$key];
                }
                $this->$key = $val;
            }
        }
        return $this;
    }

    /**
     * @param null|string|array $keys
     * @return array
     */
    function vars($keys = null) {
        if (is_string($keys)) {
            $keys = explode(',', $keys);
        }
        if (is_array($keys) && $keys) {
            $data = null;
            foreach ($keys as $key => $replace) {
                $replace = trim($replace);
                if (is_string($key)) {
                    $key = trim($key);
                    if (isset($this->$key)) {
                        $data[$replace] = $this->$key;
                    }
                } else {
                    $key = $replace;
                    if (isset($this->$key)) {
                        $data[$key] = $this->$key;
                    }
                }
            }
            return $data;
        }
        return get_object_vars($this);
    }

}