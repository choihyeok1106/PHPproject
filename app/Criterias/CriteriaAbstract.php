<?php
/**
 * Author: R.j
 * Date: 2018-12-28 15:00
 * File: CriteriaAbstract.php
 */

namespace App\Criterias;


use App\Supports\Requests;

abstract class CriteriaAbstract {

    use Requests;

    /**
     * @return $this
     */
    public static function new() {
        $called_class = get_called_class();
        $cls          = new $called_class;
        if (method_exists($cls, 'build')) {
            $cls->build();
        }
        return $cls;
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

}