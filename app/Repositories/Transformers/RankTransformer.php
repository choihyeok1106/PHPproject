<?php
/**
 * Author: R.j
 * Date: 2018-12-12 16:11
 * File: RankTransformer.php
 */

namespace App\Repositories\Transformers;


use App\Repositories\Rank;

class RankTransformer implements Transformer {

    /**
     * @param mixed $obj
     * @param mixed $fields
     * @return Rank[]
     */
    public static function transform($obj, $fields = null) {
        // TODO: Implement transform() method.
        $data = null;
        if (islist($obj)) {
            foreach ($obj as $v) {
                $rank = new Rank();
                $rank->make($v);
                $data[] = $rank->vars($fields);
            }
        }
        return $data;
    }
}