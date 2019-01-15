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
use App\Supports\Encrypt;
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
        $plaintext = "message to be encrypted";
        $key       = 'abc';
        $encrypt   = Encrypt::encode($plaintext, $key);
        pr($encrypt);
        pe(Encrypt::decode($encrypt, $key));
        pe(random_bytes(32));
        $code = Encrypt::generate();
        pr($code);
        $code = Encrypt::encode($code, '123');
        pr($code);
        $code = Encrypt::decode($code, '123');
        pe($code);
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