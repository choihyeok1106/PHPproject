<?php
/**
 * Created by PhpStorm.
 * User: hook0
 * Date: 2018-12-04
 * Time: 10:28
 */

namespace App\Http\Controllers\Ajax;


use App\Models\CartItem;
use App\Models\Transformers\CartItemsTransformer;
use App\Supports\Totals;
use App\Supports\UserPrefs;
use Illuminate\Database\Eloquent\Collection;

class CartAjax extends AjaxController {

    /**
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function count() {
        return $this->ok([
            'count' => CartItem::count(UserPrefs::id())
        ]);
    }

    /**
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function items() {
        $items = CartItem::where('user_id', UserPrefs::id())->orderBy('id', 'asc')->get();
        return $this->ok(CartItemsTransformer::collections($items, 'carts'));
    }

    /**
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function add() {
        $sku      = $this->string('sku');
        $qty      = $this->int('quantity', 1, 1);
        $customer = $this->int('customer', 0, 0);
        $price    = $this->float('price', 0, 0);
        $qv       = $this->float('qv', 0, 0);
        $cv       = $this->float('cv', 0, 0);
        $title    = $this->string('title');
        $image    = $this->string('image');

        /** @var CartItem $i */
        $i = CartItem::where('user_id', UserPrefs::id())->where('sku', $sku)->where('deleted', 0)->first();
        if ($i) {
            $i->quantity += $qty;
        } else {
            $i = new CartItem();

            $i->user_id     = UserPrefs::id();
            $i->user_number = UserPrefs::number();
            $i->customer_id = $customer;
            $i->sku         = $sku;
            $i->quantity    = $qty;
            $i->price       = $price;
            $i->qv          = $qv;
            $i->cv          = $cv;
            $i->title       = $title;
            $i->image       = $image;
        }

        if ($i->save()) {
            return $this->ok();
        }
        return $this->no('Add cart item error');
    }

    /**
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function update() {
        $sku = $this->string('sku');
        $qty = $this->int('qty');
        /** @var CartItem $i */
        $i = CartItem::where('user_id', UserPrefs::id())->where('sku', $sku)->where('deleted', 0)->first();
        if ($i) {
            $i->quantity = $qty;
            if ($i->save()) {
                return $this->ok();
            }
            return $this->no('Update error');
        }
        return $this->not_found(" #{$sku}");
    }

    /**
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function delete() {
        $sku = $this->string('sku');
        /** @var CartItem $i */
        $i = CartItem::where('user_id', UserPrefs::id())->where('sku', $sku)->where('deleted', 0)->first();
        if ($i) {
            if ($i->copy(1)) {
                $i->delete();
                return $this->ok();
            }
            return $this->no('Delete error');
        }
        return $this->not_found(" #{$sku}");
    }

    /**
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function totals() {
        $sku = $this->array('sku');
        /** @var CartItem[] $items */
        $items  = CartItem::where('user_id', UserPrefs::id())->whereIn('sku', $sku)->where('available', 1)->get();
        $totals = Totals::new();
        $totals->setItems($items)->calc();
        return $this->ok($totals->totals());
    }

    public function checkout() {
        $sku = $this->array('sku');
        /** @var Collection|CartItem[] $items */
        $items = CartItem::where('user_id', UserPrefs::id())->where('available', 0)->get();
        if (count($sku) > 0 && $items->count() > 0) {
            $currency = null;
            foreach ($items as $item) {
                if (in_array($item->sku, $sku)) {
                    if ($currency != null && $currency != $item->currency) {
                        $this->no("Select only one type currency items");
                    }
                    $currency       = $item->currency;
                    $item->selected = 1;
                } else {
                    $item->selected = 0;
                }

                $item->save();
            }
            return $this->ok();
        }
        return $this->no("Select items");
    }

}