<?php
/**
 * Created by PhpStorm.
 * User: hyeokchoi
 * Date: 2018. 8. 8.
 * Time: PM 4:49
 */

namespace App\Repositories;


use App\Constants\ItemPriceType;


/**
 * @property mixed         sku
 * @property mixed         country
 * @property mixed         title
 * @property mixed         image
 * @property mixed         price
 * @property mixed         cv
 * @property mixed         qv
 * @property mixed         freeshipping
 * @property ItemTranslate _translate
 * @property ItemPrice     _price
 * @property Currency      _currency
 * @property string        format
 */
class Item extends RepositoryAbstract {

    private $_translate;
    private $_price;
    private $_currency;

    /**
     * @return Item
     */
    public function transform() {
        $this->_currency    = $this->_currency();
        $this->_price       = $this->_price();
        $this->_translate   = $this->_translate();
        $this->sku          = $this->get('sku');
        $this->title        = $this->title();
        $this->image        = $this->image();
        $this->format       = $this->format();
        $this->price        = $this->price();
        $this->qv           = $this->qv();
        $this->cv           = $this->cv();
        $this->freeshipping = $this->get('free_shipping');
        return $this;
    }

    /**
     * @return string
     */
    public function title() {
        return $this->_translate ? $this->_translate->title : $this->get('title');
    }

    /**
     * @return string
     */
    public function format() {
        if ($this->_price) {
            if ($this->_currency) {
                $price = number_format($this->_price->price, $this->_currency->decimals);
                if ($this->_currency->formats) {
                    return str_replace('{N}', $price, $this->_currency->formats);
                } else {
                    return "{$this->_currency->symbol} {$price}";
                }
            } else {
                return '$ ' . number_format($this->_price->price, 2);
            }
        }
        return '$ 0.00';
    }

    /**
     * @return float
     */
    public function price() {
        return $this->_price ? floatval($this->_price->price) : 0;
    }

    /**
     * @return float
     */
    public function qv() {
        return floatval($this->get('qv'));
    }

    /**
     * @return float
     */
    public function cv() {
        return floatval($this->get('cv'));
    }

    /**
     * @return Currency
     */
    public function _currency() {
        return Currency::Item($this->get('currency'), false);
    }

    /**
     * @return ItemTranslate
     */
    public function _translate() {
        foreach ($this->_translates() as $translate) {
            if ($this->locale == $translate->locale) {
                return $translate;
            }
        }
        return null;
    }

    /**
     * @return ItemTranslate[]
     */
    public function _translates() {
        return ItemTranslate::Items($this->get('translates'), false);
    }

    /**
     * @return ItemPrice
     */
    public function _price() {
        $level = $this->getParam('level', Rank::Unknown);
        $type  = $this->getParam('type', ItemPriceType::Wholesale);
        foreach ($this->_prices() as $price) {
            if ($type == $price->type && $level == $price->level) {
                return $price;
            }
        }
        return null;
    }

    /**
     * @return ItemPrice[]
     */
    public function _prices() {
        return ItemPrice::Items($this->get('prices'), false);
    }

    /**
     * @return string
     */
    private function image() {
        return $this->get('image') ? $this->get('image') : '/img/nopic_product.jpg';
    }
}