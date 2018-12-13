<?php
/**
 * Author: R.j
 * Date: 2018-12-13 10:49
 * File: ModelTrait.php
 */

namespace App\Models;


trait ModelTrait {

    /**
     * @param string $soring
     * @param int    $increase
     * @return int
     */
    public function resort(string $soring = 'sorting', int $increase = 1) {
        $re = self::orderBy($soring, 'desc')->first();
        if ($re) {
            return $re->sorting + $increase;
        }
        return $increase;
    }

}