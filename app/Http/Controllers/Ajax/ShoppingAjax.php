<?php
/**
 * Created by PhpStorm.
 * User: hook0
 * Date: 2018-12-05
 * Time: 13:47
 */

namespace App\Http\Controllers\Ajax;


use App\Constants\ItemLegend;
use App\Constants\ItemPriceType;
use App\Criterias\ShippingCriteria;
use App\Demos\PromotionData;
use App\Models\CartItem;
use App\Repositories\ShippingMethod;
use App\Services\ShoppingService;
use App\Supports\UserPrefs;
use Illuminate\Http\Request;

class ShoppingAjax extends AjaxController {

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function shippings(Request $request) {
        $c         = ShippingCriteria::new($request->all());
        $c->orders = 1;
        $c->reps   = 1;
        $c->type   = ItemPriceType::Wholesale;
        $c->legend = ItemLegend::Catalog;

        /** @var CartItem[] $items */
        $items = CartItem::ShoppingItems(UserPrefs::id());
        foreach ($items as $item) {
            $c->items[$item->sku] = $item->quantity;
        }
        $svc  = ShoppingService::shippings($c);
        $data = ShippingMethod::Items($svc->data());
        return $this->ok($data);
    }

    /**
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function promotions() {
        $promotions = PromotionData::getPromotions();
        return $this->ok($promotions);
    }

    public function place(){
        return $this->ok($_POST);
    }


}