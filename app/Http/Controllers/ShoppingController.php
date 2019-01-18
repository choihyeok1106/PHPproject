<?php
/**
 * Created by PhpStorm.
 * User: hyeokchoi
 * Date: 2018. 8. 22.
 * Time: PM 3:01
 */

namespace App\Http\Controllers;


use App\Cache\ShoppingCache;
use App\Constants\ItemLegend;
use App\Constants\ItemPriceType;
use App\Criterias\ItemsCriteria;
use App\Models\CartItem;
use App\Repositories\PaymentMethod;
use App\Supports\UserPrefs;
use Illuminate\Database\Eloquent\Collection;

class ShoppingController extends Controller {

    public function cart() {
        /** @var ItemsCriteria $c */
        $c         = ItemsCriteria::new();
        $c->type   = ItemPriceType::Wholesale;
        $c->legend = ItemLegend::Catalog;
        CartItem::syncPrices(UserPrefs::id(), 0, $c);
        return view('shopping.cart');
    }

    /**
     * @return $this
     */
    public function checkout() {
        $payments = ShoppingCache::payments();
        /** @var ItemsCriteria $c */
        $c         = ItemsCriteria::new();
        $c->type   = ItemPriceType::Wholesale;
        $c->legend = ItemLegend::Catalog;
        CartItem::syncPrices(UserPrefs::id(), 0, $c);
        /** @var Collection|CartItem[] $items */
        $items = CartItem::ShoppingItems(UserPrefs::id());
        if (!$items->count()) {
            abort(404);
        }
        return view('shopping.checkout',
            [
                'items'    => $items,
                'payments' => PaymentMethod::Items($payments, false),
            ]);
    }

    public function complete() {
        return view('shopping.complete');
    }
}