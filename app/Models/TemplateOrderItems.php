<?php
/**
 * Author: R.j
 * Date: 2019-01-09 19:30
 * File: TemplateOrderItems.php
 */

namespace App\Models;


/**
 * @property mixed id
 * @property mixed tmp_id
 * @property mixed cart_id
 * @property mixed sku
 * @property mixed image
 * @property mixed title
 * @property mixed quantity
 * @property mixed price
 * @property mixed qv
 * @property mixed cv
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
 */
class TemplateOrderItems extends BaseModel {

    public function price(){
        $price = number_format($this->price, $this->currency_decimals);
        if ($this->currency_prefix || $this->currency_suffix) {
            return "{$this->currency_prefix}{$price}{$this->currency_suffix}";
        } else {
            return "{$this->currency_symbol}{$price}";
        }
    }

}