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
 * @property string        price_format
 */
class ItemsSearch extends RepositoryAbstract {

    private $_translate;
    private $_price;
    private $_currency;

    /**
     * @return ItemsSearch
     */
    public function transform() {
        $this->_currency  = $this->_currency();
        $this->_price     = $this->_price();
        $this->_translate = $this->_translate();

        $this->sku          = $this->get('sku');
        $this->title        = $this->title();
        $this->image        = $this->image();
        $this->price        = $this->price();
        $this->price_format = $this->format($this->price);
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
     * @param float $price
     * @return string
     */
    public function format(float $price) {
        if ($this->_currency) {
            $price = number_format($price, $this->_currency->decimals);
            if ($this->_currency->formats) {
                return str_replace('{N}', $price, $this->_currency->formats);
            } else {
                return "{$this->_currency->symbol}{$price}";
            }
        } else {
            return '$' . number_format($this->_price->price, 2);
        }
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
        return $this->_price ? floatval($this->_price->qv) : 0;
    }

    /**
     * @return float
     */
    public function cv() {
        return $this->_price ? floatval($this->_price->cv) : 0;
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
            if (locale() == $translate->locale) {
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
        return $this->get('image') ? $this->get('image') : Nopic::ITEM;
    }
}