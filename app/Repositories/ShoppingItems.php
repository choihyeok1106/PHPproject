<?php
/**
 * Created by PhpStorm.
 * User: hyeokchoi
 * Date: 2018. 8. 8.
 * Time: PM 4:49
 */

namespace App\Repositories;


use App\Constants\ItemPriceType;
use App\Constants\Nopic;


/**
 * @property mixed    sku
 * @property mixed    country
 * @property mixed    title
 * @property mixed    image
 * @property mixed    quantity
 * @property mixed    price
 * @property mixed    cv
 * @property mixed    qv
 * @property mixed    free_shipping
 * @property Currency _currency
 * @property string   price_format
 * @property mixed    tax_category
 * @property mixed    out_stock_level
 * @property mixed    shipping_value
 * @property mixed    unit_tax
 * @property mixed    taxable_amt
 * @property mixed    retail_profit
 * @property mixed    return_price
 * @property mixed    return_taxable_amt
 * @property mixed    stocks
 * @property mixed    currency
 * @property mixed    weight
 * @property mixed    unit_measure
 * @property mixed    low_stock_level
 * @property mixed    handling_fee
 * @property mixed    shipping_surcharge
 * @property mixed    base_shipping_surcharge
 * @property mixed    stock_msg
 * @property mixed    currency_symbol
 * @property mixed    currency_prefix
 * @property mixed    currency_suffix
 * @property mixed    currency_decimals
 */
class ShoppingItems extends RepositoryAbstract {

    private $_currency;

    /**
     * @return ShoppingItems
     */
    public function transform() {
        $this->_currency = $this->_currency();

        $this->sku                     = $this->get('sku');
        $this->title                   = $this->get('title');
        $this->image                   = $this->image();
        $this->stocks                  = $this->int('stocks');
        $this->qv                      = $this->qv();
        $this->cv                      = $this->cv();
        $this->weight                  = $this->float('weight');
        $this->unit_measure            = $this->get('unit_measure');
        $this->free_shipping            = $this->int('free_shipping');
        $this->tax_category            = $this->int('tax_category');
        $this->low_stock_level         = $this->int('low_stock_level');
        $this->out_stock_level         = $this->int('out_stock_level');
        $this->handling_fee            = $this->float('handling_fee');
        $this->shipping_surcharge      = $this->float('shipping_surcharge');
        $this->base_shipping_surcharge = $this->float('base_shipping_surcharge');
        $this->shipping_value          = $this->float('shipping_value');
        $this->unit_tax                = $this->float('unit_tax');
        $this->taxable_amt             = $this->float('taxable_amt');
        $this->retail_profit           = $this->float('retail_profit');
        $this->return_price            = $this->float('return_price');
        $this->return_taxable_amt      = $this->float('return_taxable_amt');
        $this->currency                = $this->get('currency');
        $this->currency_symbol         = $this->get('currency_symbol');
        $this->currency_prefix         = $this->string('currency_prefix');
        $this->currency_suffix         = $this->string('currency_suffix');
        $this->currency_decimals       = $this->int('currency_decimals');
        $this->price                   = $this->float('price');
        $this->price_format            = $this->price_format();
        return $this;
    }

    /**
     * @return string
     */
    private function price_format() {
        $price = number_format($this->price, $this->currency_decimals);
        if ($this->currency_prefix || $this->currency_suffix) {
            return "{$this->currency_prefix}{$price}{$this->currency_suffix}";
        } else {
            return "{$this->currency_symbol}{$price}";
        }
    }

    /**
     * @return float
     */
    private function qv() {
        return floatval($this->get('qv'));
    }

    /**
     * @return float
     */
    private function cv() {
        return floatval($this->get('cv'));
    }

    /**
     * @return string
     */
    private function image() {
        return $this->get('image') ? $this->get('image') : Nopic::ITEM;
    }

    /**
     * @return Currency
     */
    public function _currency() {
        return Currency::Item($this->get('currency'), false);
    }

    /**
     * @param int $quantity
     * @return ShoppingItems
     */
    public function setQuantity(int $quantity) {
        $this->quantity = $quantity;
        return $this;
    }
}