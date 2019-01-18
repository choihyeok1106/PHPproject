<?php
/**
 * Author: R.j
 * Date: 2019-01-16 17:28
 * File: ShippingMethod.php
 */

namespace App\Repositories;

use App\Supports\Crypt;
use App\Supports\UserPrefs;


/**
 * @property null     name
 * @property null     items
 * @property null     cv
 * @property null     qv
 * @property null     tax
 * @property null     shipping
 * @property null     handling
 * @property null     discount
 * @property null     total
 * @property Currency _currency
 */
class ShippingMethod extends RepositoryAbstract {

    private $_currency;

    /**
     * @return ShippingMethod
     */
    public function transform() {
        $this->_currency = $this->_currency();
        $this->id        = $this->get('id');
        $this->items     = $this->format($this->float('items'));
        $this->cv        = $this->float('cv');
        $this->qv        = $this->float('qv');
        $this->tax       = $this->format($this->float('items_tax') + $this->float('items_vat'));
        $this->shipping  = $this->format($this->float('shipping_fee') + $this->float('shipping_tax'));
        $this->handling  = $this->format($this->float('handling_fee') + $this->float('handling_tax'));
        $this->discount  = $this->format($this->float('discount'));
        $this->total     = $this->format($this->float('total'));
        $this->name      = $this->name();
        return $this;
    }

    private function name() {
        $shipping = $this->float('shipping_fee') + $this->float('shipping_tax');
        $shipping = $shipping > 0 ? $this->shipping : 'FREE Shipping';
        return $this->get('name') . " ({$shipping})";
    }

    private function format($price) {
        if ($this->_currency) {
            return $this->_currency->format($price);
        }
        return $price;
    }

    /**
     * @return Currency
     */
    private function _currency() {
        return Currency::Item($this->get('currency'), false);
    }

}