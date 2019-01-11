<?php
/**
 * Author: R.j
 * Date: 2019-01-11 14:27
 * File: CartItemsTransformer.php
 */

namespace App\Models\Transformers;


use App\Models\CartItem;

class CartItemsTransformer extends Transformer {

    public function carts(CartItem $obj) {
        return [
            'sku'          => $obj->sku,
            'image'        => $obj->image(),
            'title'        => $obj->title,
            'quantity'     => $obj->quantity,
            'price'        => $obj->price,
            'price_format' => $obj->price(),
            'qv'           => $obj->qv(),
            'cv'           => $obj->cv,
            'stocks'       => $obj->stocks(),
            'available'    => $obj->available,
            'selected'     => $obj->selected,
            'stock_msg'    => $obj->stock_msg(),
            'stock_status' => $obj->stock_status,
        ];
    }

}