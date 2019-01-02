<?php
/**
 * Author: R.j
 * Date: 2018-12-28 10:04
 * File: RepositoryAbstract.php
 */

namespace App\Repositories;


/**
 * @property mixed locale
 */
abstract class RepositoryAbstract {

    /** @var mixed $locale */
    private $_data;

    /**
     * @return mixed
     */
    public function transform() {
        $this->setAttrs();
        return $this;
    }

    /**
     * @param mixed $data
     * @return $this
     */
    public function set($data) {
        $this->_data = $data;
        return $this;
    }

    /**
     * set attributes
     */
    public function setAttrs() {
        if (is_array($this->_data)) {
            foreach ($this->_data as $k => $v) {
                $this->$k = $v;
            }
        }
    }

    /**
     * @return array
     */
    public function getAttrs() {
        return get_object_vars($this);
    }

    /**
     * @param array $data
     * @return $this
     */
    public static function make(array $data) {
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
        if (method_exists($this, $name)) {
            return $this->$name();
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
     * @return array
     */
    public static function Items($result, bool $resourceKey = true) {
        $data  = [];
        $items = isset($result['data']) ? $result['data'] : $result;
        $meta  = isset($result['meta']) ? $result['meta'] : [];
        if (islist($items)) {
            foreach ($items as $k => $v) {
                $item = self::item($v, false);
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
     * @return null
     */
    public static function Item($result, $resourceKey = true) {
        $obj  = null;
        $cls  = get_called_class();
        $data = isset($result['data']) ? $result['data'] : $result;
        $meta = isset($result['meta']) ? $result['meta'] : [];
        if (class_exists($cls) && is_array($data) && $data) {
            $obj = new $cls;
            if (method_exists($obj, 'transform') && method_exists($obj, 'set')) {
                $obj = $obj->set($data)->transform();
            } else {
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