<?php
/**
 * Author: R.j
 * Date: 2018-12-12 16:23
 * File: Transformer.php
 */

namespace App\Repositories\Transformers;


interface Transformer {

    /**
     * @param mixed $obj
     * @param mixed $fields
     * @return mixed
     */
    public static function transform($obj, $fields = null);

}