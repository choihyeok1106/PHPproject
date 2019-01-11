<?php
/**
 * Created by PhpStorm.
 * User: hyeokchoi
 * Date: 2018. 8. 22.
 * Time: PM 3:01
 */

namespace App\Http\Controllers;


use App\Constants\ItemLegend;
use App\Constants\ItemPriceType;
use App\Criterias\ItemsCriteria;
use App\Models\CartItem;
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
        /** @var ItemsCriteria $c */
        $c         = ItemsCriteria::new();
        $c->type   = ItemPriceType::Wholesale;
        $c->legend = ItemLegend::Catalog;
        CartItem::syncPrices(UserPrefs::id(), 0, $c);
        /** @var Collection|CartItem[] $items */
        $items = CartItem::where('user_id', UserPrefs::id())->where('selected', 1)->where('available', 1)->get();
        if (!$items->count()) {
            abort(404);
        }
        return view('shopping.checkout', ['items' => $items]);
    }

    public function complete() {
        return view('shopping.complete');
    }
}