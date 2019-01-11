<?php
/**
 * Author: R.j
 * Date: 2019-01-09 18:22
 * File: TemplateOrders.php
 */

namespace App\Models;

use App\Repositories\ShoppingItems;


/**
 * @property mixed                id
 * @property mixed                user_id
 * @property mixed                user_number
 * @property mixed                customer_id
 * @property mixed                entered
 * @property string               code
 * @property CartItem             cartitems
 * @property TemplateOrderItems[] tempitems
 */
class TemplateOrders extends BaseModel {

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cartitems() {
        return $this->hasMany(CartItem::class, 'tmp_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tempitems() {
        return $this->hasMany(TemplateOrderItems::class, 'tmp_id', 'id');
    }

    /**
     * @return bool
     */
    public function isTemplate() {
        return $this->tempitems->count() && $this->cartitems->count();
    }

    public function generateCode() {
        $str       = 'A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,W,X,Y,Z';
        $alphabet  = explode(',', $str);
        $yearIndex = date('Y') % 26;
        $yearCode  = $alphabet[$yearIndex];
        $monthCode = $alphabet[date('n') * rand(1, 2)];
        $day       = date('j');
        if ($day < 10) {
            $dayCode = $day;
        } else {
            $dayCode = $alphabet[$day - 10];
        }
        $hourCode  = $alphabet[intval(date('H'))];
        $timeCode  = date('is');
        $microCode = intval((microtime(true) - strtotime(date('YmdHis'))) * 10000);
        return base64_encode($yearCode . $monthCode . $dayCode . $hourCode . $timeCode . $microCode);
    }

    public function getItemsSku() {
        $sku = [];
        foreach ($this->tempitems as $tempitem) {
            $sku[] = $tempitem->sku;
        }
        return $sku;
    }

    /**
     * @param ShoppingItems $shoppingtem
     * @return bool
     */
    public function setItemPrice(ShoppingItems $shoppingtem) {
        if ($shoppingtem) {
            foreach ($this->tempitems as $k => $item) {
                if ($shoppingtem->sku == $item->sku) {
                    $item->price                   = $shoppingtem->price;
                    $item->qv                      = $shoppingtem->qv;
                    $item->cv                      = $shoppingtem->cv;
                    $item->weight                  = $shoppingtem->weight;
                    $item->unit_measure            = $shoppingtem->unit_measure;
                    $item->free_shipping           = $shoppingtem->free_shipping;
                    $item->tax_category            = $shoppingtem->tax_category;
                    $item->stocks                  = $shoppingtem->stocks;
                    $item->low_stock_level         = $shoppingtem->low_stock_level;
                    $item->out_stock_level         = $shoppingtem->out_stock_level;
                    $item->handling_fee            = $shoppingtem->handling_fee;
                    $item->shipping_surcharge      = $shoppingtem->shipping_surcharge;
                    $item->base_shipping_surcharge = $shoppingtem->base_shipping_surcharge;
                    $item->shipping_value          = $shoppingtem->shipping_value;
                    $item->unit_tax                = $shoppingtem->unit_tax;
                    $item->taxable_amt             = $shoppingtem->taxable_amt;
                    $item->retail_profit           = $shoppingtem->retail_profit;
                    $item->return_price            = $shoppingtem->return_price;
                    $item->return_taxable_amt      = $shoppingtem->return_taxable_amt;
                    $item->currency                = $shoppingtem->currency;
                    $item->currency_symbol         = $shoppingtem->currency_symbol;
                    $item->currency_prefix         = $shoppingtem->currency_prefix;
                    $item->currency_suffix         = $shoppingtem->currency_suffix;
                    $item->currency_decimals       = $shoppingtem->currency_decimals;
                    if ($item->save()) {
                        $this->tempitems[$k] = $item;
                        return true;
                    }
                    break;
                }
            }
        }
        return false;
    }

}