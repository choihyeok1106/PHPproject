<?php
/**
 * Author: R.j
 * Date: 2018-12-28 10:04
 * File: RepositoryAbstract.php
 */

namespace App\Repositories;

use App\Criterias\CriteriaAbstract;


/**
 * @property mixed locale
 */
abstract class RepositoryAbstract {

    /** @var mixed $locale */
    private $_data;
    /** @var CriteriaAbstract $_params */
    private $_params;

    /**
     * @return mixed
     */
    public function transform() {
        $this->attrs();
        return $this;
    }

    /**
     * @param mixed $data
     * @param mixed $params
     * @return $this
     */
    public function set($data, CriteriaAbstract $params = null) {
        $this->_data   = $data;
        $this->_params = $params;
        return $this;
    }


    /**
     * @param string $key
     * @param mixed  $deft
     * @return null
     */
    public function getParam(string $key, $deft = null) {
        return isset($this->_params->$key) ? $this->_params->$key : $deft;
    }

    /**
     * set attributes
     */
    public function attrs() {
        if (is_array($this->_data)) {
            foreach ($this->_data as $k => $v) {
                $this->$k = $v;
            }
        }
    }

    /**
     * @return array
     */
    public function vars() {
        $data = get_object_vars($this);
        if (key_exists('_data', $data)) {
            unset($data['_data']);
        }
        if (key_exists('_params', $data)) {
            unset($data['_params']);
        }
        return $data;
    }

    /**
     * @param array $data
     * @return $this
     */
    public static function new(array $data = null) {
        $called_class = get_called_class();
        $obj          = new $called_class;
        if (is_array($data)) {
            foreach ($data as $key => $val) {
                $obj->$key = $val;
            }
        }
        return $obj;
    }

    /**
     * @param $name
     * @return null
     */
    public function __get($name) {
        // TODO: Implement __get() method.
        if (isset($this->$name)) {
            return $this->$name;
        }
        if ($name === 'locale') {
            return locale();
        }
        return null;
    }

    /**
     * @param string $key
     * @param null   $deft
     * @return null
     */
    protected function get(string $key, $deft = null) {
        return isset($this->_data[$key]) ? $this->_data[$key] : $deft;
    }

    /**
     * @param mixed $result
     * @param bool  $resourceKey
     * @param mixed $params
     * @return array
     */
    public static function Items($result, bool $resourceKey = true, $params = null) {
        $data  = [];
        $items = isset($result['data']) ? $result['data'] : $result;
        $meta  = isset($result['meta']) ? $result['meta'] : [];
        if (islist($items)) {
            foreach ($items as $k => $v) {
                $item = self::item($v, false, $params);
                if ($item) {
                    $data[] = $item;
                }
            }
        }
        if ($resourceKey) {
            return [
                'data' => $data,
                'meta' => $meta
            ];
        } else {
            return $data;
        }
    }

    /**
     * @param mixed $result
     * @param bool  $resourceKey
     * @param mixed $params
     * @return null
     */
    public static function Item($result, $resourceKey = true, $params = null) {
        $obj  = null;
        $cls  = get_called_class();
        $data = isset($result['data']) ? $result['data'] : $result;
        $meta = isset($result['meta']) ? $result['meta'] : [];
        if (class_exists($cls) && is_array($data) && $data) {
            $obj = new $cls;
            if (method_exists($obj, 'transform') && method_exists($obj, 'set')) {
                $obj = $obj->set($data, $params)->transform();
            } else {
                $obj->_params = $params;
                foreach ($data as $k => $v) {
                    $obj->$k = $v;
                }
            }
        }
        if ($resourceKey) {
            return [
                'data' => $data,
                'meta' => $meta
            ];
        } else {
            return $obj;
        }
    }

}