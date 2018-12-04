<?php
/**
 * Created by PhpStorm.
 * User: hook0
 * Date: 2018-12-04
 * Time: 10:28
 */

namespace App\Http\Controllers\Ajax;


use App\Demos\ItemData;
use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Supports\UserPrefs;
use Illuminate\Http\Request;

class ShoppingAjax extends Controller {

    use Ajax;

    public function addCart(Request $request) {
        if ($request->ajax()) {
            $sku      = $request->get('sku');
            $qty      = intval($request->get('qty'));
            $customer = intval($request->get('customer', 0));
            /** @var CartItem $i */
            $i = CartItem::where('user_id', UserPrefs::getID())->where('sku', $sku)->first();
            if ($i) {
                $i->quantity += $qty;
            } else {
                $i = new CartItem();

                $i->user_id     = UserPrefs::getID();
                $i->user_number = UserPrefs::getNumber();
                $i->customer_id = $customer;
                $i->sku         = $sku;
                $i->quantity    = $qty;
            }
            if ($i->save()) {
                return $this->ok([
                    'total' => rand(100, 9999),
                    'count' => rand(1, 99),
                    'item'  => ItemData::getItem($sku)
                ]);
            }
            return $this->no('Add cart item error');
        }
        return $this->badRequest();
    }

}