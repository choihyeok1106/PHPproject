<?php
/**
 * Author: R.j
 * Date: 2018-12-28 15:00
 * File: CriteriaAbstract.php
 */

namespace App\Criterias;


use App\Supports\Requests;

abstract class Criteria {

    use Requests;

    /**
     * @param array|null $data
     * @return $this
     */
    public static function new(array $data = null) {
        $called_class = get_called_class();
        return new $called_class($data);
    }

    /**
     * CriteriaAbstract constructor.
     * @param array|null $data
     */
    public function __construct(array $data = null) {
        if (is_array($data)) {
            foreach ($data as $k => $v) {
                $this->$k = $v;
            }
        }
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function __get(string $name) {
        // TODO: Implement __get() method.
        if (isset($this->$name)) {
            $this->$name;
        }
        if (method_exists($this, $name)) {
            return $this->$name();
        }
        return null;
    }

    /**
     * @param mixed $key
     * @param mixed $val
     * @return $this
     */
    public function set($key, $val) {
        $this->$key = $val;
        return $this;
    }

}