<?php
/**
 * Created by PhpStorm.
 * User: hook0
 * Date: 2018-12-04
 * Time: 10:28
 */

namespace App\Http\Controllers\Ajax;


use App\Demos\ItemData;
use App\Models\CartItem;
use App\Supports\UserPrefs;
use Illuminate\Http\Request;

class CartAjax extends AjaxController {

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function items(Request $request) {
        if ($request->ajax()) {
            $items = CartItem::where('user_id', UserPrefs::getID())->get()->toArray();;
            return $this->ok([
                'items' => $items,
                'total' => ItemData::getTotal()
            ]);
        }
        return $this->badRequest();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function add(Request $request) {
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
                $i->title       = 'Webarch UI Framework Dashboard UI Pack' . rand(1, 99);
                $i->thumbnail   = 'https://extranet.securefreedom.com/GenesisPure/Shopping/Images/144_GoYin-single-150-blue_1.jpg';
                $i->sku         = $sku;
                $i->quantity    = $qty;
                $i->price       = rand(10, 999);
                $i->qv          = $i->price / 10;
                $i->cv          = $i->qv;
            }
            if ($i->save()) {
                return $this->ok([
                    'total' => ItemData::getTotal(),
                    'item'  => ItemData::getItem($sku)
                ]);
            }
            return $this->no('Add cart item error');
        }
        return $this->badRequest();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function update(Request $request) {
        if ($request->ajax()) {
            $sku = $request->get('sku');
            $qty = intval($request->get('qty'));
            /** @var CartItem $i */
            $i = CartItem::where('user_id', UserPrefs::getID())->where('sku', $sku)->first();
            if ($i) {
                $i->quantity = $qty;
                if ($i->save()) {
                    return $this->ok();
                }
                return $this->no('Update error');
            }
            return $this->no('Not found');
        }
        return $this->badRequest();
    }

    public function delete(Request $request) {
        if ($request->ajax()) {
            $sku = $request->get('sku');
            /** @var CartItem $i */
            $i = CartItem::where('user_id', UserPrefs::getID())->where('sku', $sku)->first();
            if ($i) {
                if ($i->delete()) {
                    return $this->ok();
                }
                return $this->no('Delete error');
            }
            return $this->no('Not found');
        }
        return $this->badRequest();
    }

}