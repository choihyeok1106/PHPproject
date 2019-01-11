<?php
/**
 * Author: R.j
 * Date: 2019-01-09 20:43
 * File: TemplateOrderItemsResouce.php
 */

namespace App\Models\Resources;


use App\Models\TemplateOrderItems;
use Illuminate\Database\Eloquent\Collection;

class TemplateOrderItemsResource {


    /**
     * @param Collection $items
     * @return TemplateOrderItems[]
     */
    public static function collections(Collection $items) {
        $data = [];
        foreach ($items as $item) {
            $data[$item->sku] = $item;
        }
        return $data;
    }
}