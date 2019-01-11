<?php
/**
 * Author: R.j
 * Date: 2019-01-09 20:19
 * File: CheckoutAjax.php
 */

namespace App\Http\Controllers\Ajax;


use App\Cache\ShippingCache;
use App\Constants\ItemLegend;
use App\Constants\ItemPriceType;
use App\Criterias\ItemsCriteria;
use App\Models\Resources\TemplateOrderItemsResource;
use App\Models\TemplateOrderItems;
use App\Repositories\ShoppingItems;
use App\Services\ShoppingService;

class CheckoutAjax extends AjaxController {

    public function shippings() {
        $data = ShippingCache::methods();
        return $this->ok($data);
    }

    public function items(int $id) {
        abort(404);
        $sku = [];
        /** @var TemplateOrderItems[] $orderitems */
        $orderitems = TemplateOrderItemsResource::collections(TemplateOrderItems::where('tmp_id', $id)->get());
        if (!$orderitems) {
            return $this->no("order items error");
        }
        pe($orderitems);
        foreach ($orderitems as $orderitem) {
            $sku[] = $orderitem->sku;
        }
        /** @var ItemsCriteria $c */
        $c         = ItemsCriteria::new();
        $c->type   = ItemPriceType::Wholesale;
        $c->legend = ItemLegend::Catalog;
        $c->search = $sku;
        $svc       = ShoppingService::items($c);
        if (!$svc->succeed()) {
            return $this->no($svc->error());
        }
        /** @var ShoppingItems[] $shoppingitems */
        $shoppingitems[] = [];
        foreach ($svc->data() as $v) {
            /** @var ShoppingItems $shoppingitem */
            $shoppingitem = ShoppingItems::Item($v, false);

            $shoppingitems[$shoppingitem->sku] = $shoppingitem;
        }
        foreach ($orderitems as $k => $orderitem) {
            if (!isset($shoppingitems[$orderitem->sku])) {
                return $this->no("order item error #{$orderitem->sku}");
            }
            $shoppingitem = $shoppingitems[$orderitem->sku];
            //            $shoppingitem = isset($shoppingitems[$cartitem->sku]) ? $shoppingitems[$orderitem->sku] : null;
            //            $cartitem->setShoppingItem($shoppingitem);
            //            $cartitems[$k] = $cartitem->carts();
        }
    }

}