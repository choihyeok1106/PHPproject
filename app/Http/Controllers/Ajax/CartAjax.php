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
    public function count(Request $request) {
        if ($request->ajax()) {
            return $this->ok([
                'count' => CartItem::count(UserPrefs::id())
            ]);
        }
        return $this->badRequest();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function items(Request $request) {
        if ($request->ajax()) {
            $items = CartItem::where('user_id', UserPrefs::id())->get()->toArray();;
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
            $sku      = $this->string('sku');
            $qty      = $this->int('quantity', 1, 1);
            $customer = $this->int('customer', 0, 0);
            $price    = $this->float('price', 0, 0);
            $qv       = $this->float('qv', 0, 0);
            $cv       = $this->float('cv', 0, 0);
            $title    = $this->string('title');
            $image    = $this->string('image');
            /** @var CartItem $i */
            $i = CartItem::where('user_id', UserPrefs::id())->where('sku', $sku)->first();
            if ($i) {
                $i->quantity += $qty;
            } else {
                $i = new CartItem();

                $i->user_id     = UserPrefs::id();
                $i->user_number = UserPrefs::number();
                $i->customer_id = $customer;

                $i->sku      = $sku;
                $i->quantity = $qty;
            }
            $i->price = $price;
            $i->qv    = $qv;
            $i->cv    = $cv;
            $i->title = $title;
            $i->image = $image;

            if ($i->save()) {
                return $this->ok([
                    'count' => CartItem::count(UserPrefs::id())
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
            $i = CartItem::where('user_id', UserPrefs::id())->where('sku', $sku)->first();
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
            $i = CartItem::where('user_id', UserPrefs::id())->where('sku', $sku)->first();
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