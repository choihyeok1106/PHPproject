<?php
/**
 * Created by PhpStorm.
 * User: hook0
 * Date: 2018-12-04
 * Time: 10:39
 */

namespace App\Models;


use App\Constants\Nopic;
use App\Criterias\ItemsCriteria;
use App\Repositories\ShoppingItems;
use App\Services\ShoppingService;
use App\Supports\UserPrefs;
use Illuminate\Database\Eloquent\Collection;


/**
 * @property mixed user_id
 * @property mixed user_number
 * @property mixed customer_id
 * @property mixed title
 * @property mixed image
 * @property mixed sku
 * @property mixed quantity
 * @property mixed price
 * @property mixed qv
 * @property mixed cv
 * @property mixed available
 * @property mixed weight
 * @property mixed unit_measure
 * @property mixed free_shipping
 * @property mixed tax_category
 * @property mixed stocks
 * @property mixed low_stock_level
 * @property mixed out_stock_level
 * @property mixed handling_fee
 * @property mixed shipping_surcharge
 * @property mixed base_shipping_surcharge
 * @property mixed shipping_value
 * @property mixed unit_tax
 * @property mixed taxable_amt
 * @property mixed retail_profit
 * @property mixed return_price
 * @property mixed return_taxable_amt
 * @property mixed currency
 * @property mixed currency_symbol
 * @property mixed currency_prefix
 * @property mixed currency_suffix
 * @property mixed currency_decimals
 * @property mixed stock_status
 * @property mixed oid
 * @property mixed tmp_id
 * @property mixed selected
 */
class CartItem extends BaseModel {

    protected $table = 'cart_items';

    /**
     * @return CartItem
     */
    public static function new() {
        return new CartItem;
    }

    /**
     * @param int $userId
     * @return int
     */
    public static function count(int $userId) {
        return parent::query()->where('user_id', $userId)->where('available', 1)->sum('quantity');
    }

    /**
     * @param int $delete
     * @return bool
     */
    public function copy(int $delete = 0) {
        $table = $this->table . '_' . date('Y', $this->created_at->getTimestamp());
        if ($this->mkTable($table, $this->table)) {
            $new                          = CartItem::new()->setTable($table);
            $new->oid                     = $this->id;
            $new->user_id                 = $this->user_id;
            $new->user_number             = $this->user_number;
            $new->customer_id             = $this->customer_id;
            $new->sku                     = $this->sku;
            $new->image                   = $this->image;
            $new->title                   = $this->title;
            $new->quantity                = $this->quantity;
            $new->price                   = $this->price;
            $new->qv                      = $this->qv;
            $new->cv                      = $this->cv;
            $new->weight                  = $this->weight;
            $new->unit_measure            = $this->unit_measure;
            $new->free_shipping           = $this->free_shipping;
            $new->tax_category            = $this->tax_category;
            $new->stocks                  = $this->stocks;
            $new->low_stock_level         = $this->low_stock_level;
            $new->out_stock_level         = $this->out_stock_level;
            $new->handling_fee            = $this->handling_fee;
            $new->shipping_surcharge      = $this->shipping_surcharge;
            $new->base_shipping_surcharge = $this->base_shipping_surcharge;
            $new->shipping_value          = $this->shipping_value;
            $new->unit_tax                = $this->unit_tax;
            $new->taxable_amt             = $this->taxable_amt;
            $new->retail_profit           = $this->retail_profit;
            $new->return_price            = $this->return_price;
            $new->return_taxable_amt      = $this->return_taxable_amt;
            $new->currency                = $this->currency;
            $new->currency_symbol         = $this->currency_symbol;
            $new->currency_prefix         = $this->currency_prefix;
            $new->currency_suffix         = $this->currency_suffix;
            $new->currency_decimals       = $this->currency_decimals;
            $new->available               = $this->available;
            $new->selected                = $this->selected;
            $new->created_at              = $this->created_at;
            $new->updated_at              = $this->updated_at;
            $new->deleted                 = $delete;
            $new->deleted_at              = $delete ? date('Y-m-d H:i:s') : null;
            return $new->save();
        }
        return false;
    }

    public static function syncPrices(int $user, int $customer, ItemsCriteria $c) {
        /** @var CartItem[]|Collection $cartitems */
        $cartitems = parent::where('user_id', $user)->where('customer_id', $customer)->get();
        if ($cartitems->count() > 0) {
            $sku = [];
            foreach ($cartitems as $item) {
                $sku[] = $item->sku;
            }
            $c->search     = $sku;
            $svc           = ShoppingService::items($c);
            $shoppingitems = [];
            if ($svc->succeed()) {
                foreach ($svc->data() as $v) {
                    /** @var ShoppingItems $shoppingitem */
                    $shoppingitem                      = ShoppingItems::Item($v, false);
                    $shoppingitems[$shoppingitem->sku] = $shoppingitem;
                }
            }
            foreach ($cartitems as $item) {
                $shoppingitem = isset($shoppingitems[$item->sku]) ? $shoppingitems[$item->sku] : null;
                $item->setShoppingitem($shoppingitem);
            }
        }
    }

    /**
     * @param ShoppingItems|null $shoppingitem
     * @return bool
     */
    public function setShoppingitem(ShoppingItems $shoppingitem = null) {
        if ($shoppingitem) {
            $this->price                   = $shoppingitem->price;
            $this->qv                      = $shoppingitem->qv;
            $this->cv                      = $shoppingitem->cv;
            $this->weight                  = $shoppingitem->weight;
            $this->unit_measure            = $shoppingitem->unit_measure;
            $this->free_shipping           = $shoppingitem->free_shipping;
            $this->tax_category            = $shoppingitem->tax_category;
            $this->stocks                  = $shoppingitem->stocks;
            $this->low_stock_level         = $shoppingitem->low_stock_level;
            $this->out_stock_level         = $shoppingitem->out_stock_level;
            $this->handling_fee            = $shoppingitem->handling_fee;
            $this->shipping_surcharge      = $shoppingitem->shipping_surcharge;
            $this->base_shipping_surcharge = $shoppingitem->base_shipping_surcharge;
            $this->shipping_value          = $shoppingitem->shipping_value;
            $this->unit_tax                = $shoppingitem->unit_tax;
            $this->taxable_amt             = $shoppingitem->taxable_amt;
            $this->retail_profit           = $shoppingitem->retail_profit;
            $this->return_price            = $shoppingitem->return_price;
            $this->return_taxable_amt      = $shoppingitem->return_taxable_amt;
            $this->currency                = $shoppingitem->currency;
            $this->currency_symbol         = $shoppingitem->currency_symbol;
            $this->currency_prefix         = $shoppingitem->currency_prefix;
            $this->currency_suffix         = $shoppingitem->currency_suffix;
            $this->currency_decimals       = $shoppingitem->currency_decimals;
            $this->available               = 1;
            if ($this->quantity > $this->stocks()) {
                $this->quantity = $this->stocks();
            }
        } else {
            $this->available = 0;
        }
        return $this->save();
    }

    /**
     * @return string
     */
    public function qv() {
        return number_format($this->qv);
    }

    /**
     * @return string
     */
    public function stock_msg() {
        $this->stock_status = 0;
        if (!$this->available) {
            return 'This item is no longer available';
        }
        if ($this->stocks <= $this->out_stock_level) {
            $this->stock_status = 1;
            return "Out of stock";
        }
        if ($this->stocks <= $this->low_stock_level) {
            $this->stock_status = 1;
            return "Only {$this->stocks} left in stock - order soon.";
        }
        return 'In Stock';
    }

    /**
     * @return mixed|string
     */
    public function image() {
        return $this->image ? $this->image : Nopic::ITEM;
    }

    /**
     * @return string
     */
    public function price() {
        $price = number_format($this->price, $this->currency_decimals);
        if ($this->currency_prefix || $this->currency_suffix) {
            return "{$this->currency_prefix}{$price}{$this->currency_suffix}";
        } else {
            return "{$this->currency_symbol}{$price}";
        }
    }

    /**
     * @return int
     */
    public function stocks() {
        return $this->stocks > $this->out_stock_level ? $this->stocks - $this->out_stock_level : 0;
    }

}