<?php
/**
 * Author: R.j
 * Date: 2019-01-08 17:07
 * File: Totals.php
 */

namespace App\Supports {

    /**
     * @property int      total_count
     * @property float    cv_total
     * @property float    qv_total
     * @property float    items_total
     * @property float    tax_total
     * @property float    handling_total
     * @property float    shipping_total
     * @property float    discount_total
     * @property float    order_total
     * @property array    total_weight
     * @property Item[]   items
     * @property Currency currency
     */
    class Totals {

        private $items = [];

        private $cv_total = 0;
        private $qv_total = 0;
        private $items_total = 0;
        private $total_count = 0;
        private $tax_total = 0;
        private $handling_total = 0;
        private $shipping_total = 0;
        private $discount_total = 0;
        private $order_total = 0;
        private $total_weight = [];

        private $currency;

        private $error;

        /**
         * @return Totals
         */
        public static function new() {
            return new Totals;
        }

        /**
         * @param string $message
         * @return $this
         */
        private function error(string $message) {
            $this->error = new Error($message);
            return $this;
        }

        /**
         * @param mixed $number
         * @return string
         */
        private function price_format($number) {
            if ($this->currency) {
                $number = number_format($number, $this->currency->decimals);
                if ($this->currency->prefix || $this->currency->suffix) {
                    return "{$this->currency->prefix}{$number}{$this->currency->suffix}";
                } else {
                    return "{$this->currency->symbol}{$number}";
                }
            }
            return '';
        }

        /**
         * @return array
         */
        public function totals() {
            if ($this->error) {
                return [
                    'error' => $this->error
                ];
            }
            return [
                'total_count'        => $this->total_count,
                'cv_total'           => $this->cv_total,
                'qv_total'           => $this->qv_total,
                'items_total'        => $this->items_total,
                'tax_total'          => $this->tax_total,
                'handling_total'     => $this->handling_total,
                'shipping_total'     => $this->shipping_total,
                'discount_total'     => $this->discount_total,
                'order_total'        => $this->order_total,
                'total_weight'       => $this->total_weight,
                'qv_total_format'    => number_format($this->qv_total),
                'items_total_format' => $this->price_format($this->items_total),
            ];
        }

        /**
         * @param mixed $items
         * @return Totals
         */
        public function setItems($items) {
            if (is_array($items) || get_class($items) == 'Illuminate\Database\Eloquent\Collection') {
                foreach ($items as $item) {
                    if (is_object($item) && method_exists($item, 'getAttributes')) {
                        $item = $item->getAttributes();
                    }
                    if (is_array($item)) {
                        $this->setItem($item);
                    }
                }
            }

            return $this;
        }

        /**
         * @param array|null $params
         * @return Totals
         */
        public function setItem(array $params) {
            $item = Item::new($params);
            if ($item) {
                $this->items[$item->sku] = $item;
                if ($this->currency) {
                    if ($item->currency != $this->currency->id) {
                        return $this->error("Select only one type currency items");
                    }
                } else {
                    $this->currency           = new Currency;
                    $this->currency->id       = $item->currency;
                    $this->currency->symbol   = $item->currency_symbol;
                    $this->currency->prefix   = $item->currency_prefix;
                    $this->currency->suffix   = $item->currency_suffix;
                    $this->currency->decimals = $item->currency_decimals;
                }

            }
            return $this;
        }

        /**
         * @return Totals
         */
        public function calc() {
            if (!$this->error) {
                foreach ($this->items as $item) {
                    $this->total_count += $item->quantity;
                    $this->items_total += $item->price * $item->quantity;
                    $this->qv_total    += $item->qv * $item->quantity;
                    $this->cv_total    += $item->cv * $item->quantity;
                }
            }
            return $this;
        }

    }

    /**
     * @property integer code
     * @property string  message
     */
    class Error {
        public function __construct(string $message) {
            $this->code    = 405;
            $this->message = $message;
        }
    }

    /**
     * @property string id
     * @property string symbol
     * @property string prefix
     * @property string suffix
     * @property int    decimals
     */
    class Currency {
    }

    /**
     * @property mixed sku
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
    class Item {

        public $sku;
        public $quantity;
        public $price;
        public $qv;
        public $cv;
        public $weight;
        public $unit_measure;
        public $free_shipping;
        public $tax_category;
        public $stocks;
        public $low_stock_level;
        public $out_stock_level;
        public $handling_fee;
        public $shipping_surcharge;
        public $base_shipping_surcharge;
        public $shipping_value;
        public $unit_tax;
        public $taxable_amt;
        public $retail_profit;
        public $return_price;
        public $return_taxable_amt;
        public $currency;
        public $currency_symbol;
        public $currency_prefix;
        public $currency_suffix;
        public $currency_decimals;

        /**
         * @param array $params
         * @return Item|null
         */
        public static function new(array $params) {
            $item = new Item($params);
            return $item->sku ? $item : null;
        }

        public function __construct(array $params) {
            foreach ($params as $k => $v) {
                if (property_exists($this, $k)) {
                    $this->$k = $v;
                }
            }
        }
    }

}