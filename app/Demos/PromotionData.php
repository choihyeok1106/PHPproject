<?php
/**
 * Created by PhpStorm.
 * User: hook0
 * Date: 2018-12-05
 * Time: 13:50
 */

namespace App\Demos;


use App\Repositories\Promotion;

class PromotionData {

    /**
     * @return Promotion[]
     */
    public static function getPromotions() {
        $data = [];
        for ($i = 1; $i < 4; $i++) {
            $p              = new Promotion();
            $p->id          = $i;
            $p->name        = "Rally28 $5 Ground Shipping - {$i}";
            $p->description =
                $i . ' - Tight pants next level keffiyeh trigger me on click haven\'t heard of them. Photo booth beard raw denim letterpress vegan messenger bag stumptown.';
            $data[$p->id]         = $p;
        }
        return $data;
    }

}