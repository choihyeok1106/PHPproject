<?php
/**
 * Author: R.j
 * Date: 2019-01-04 16:27
 * File: Item.php
 */

namespace App\Repositories;


use App\Constants\ItemPriceType;
use App\Constants\Nopic;

/**
 * @property ItemTranslate _translate
 * @property Currency      _currency
 * @property ItemPrice     _price
 * @property ItemPrice     _retail_price
 * @property mixed         sku
 * @property mixed         title
 * @property mixed         explanation
 * @property mixed         long_explanation
 * @property mixed         supplement_facts
 * @property mixed         recommended_use
 * @property mixed         shipping_return
 * @property mixed         low_stock_level
 * @property mixed         out_stock_level
 * @property mixed         images
 * @property mixed         groups
 * @property mixed         price
 * @property mixed         cv
 * @property mixed         qv
 * @property mixed         price_format
 * @property float         retail_price
 * @property string        retail_format
 * @property string        low_stock_msg
 */
class Item extends RepositoryAbstract {

    private $_translate;
    private $_currency;
    private $_price;
    private $_retail_price;

    /**
     * @return Item
     */
    public function transform() {
        $this->_currency     = $this->_currency();
        $this->_translate    = $this->_translate();
        $this->_price        = $this->_price();
        $this->_retail_price = $this->_retail_price();

        $this->sku              = $this->get('sku');
        $this->title            = $this->translate('title');
        $this->price            = $this->price();
        $this->price_format     = $this->format($this->price);
        $this->retail_price     = $this->retail_price();
        $this->retail_format    = $this->format($this->retail_price);
        $this->cv               = $this->cv();
        $this->qv               = $this->qv();
        $this->explanation      = $this->translate('explanation');
        $this->long_explanation = $this->translate('long_explanation');
        $this->supplement_facts = $this->translate('supplement_facts');
        $this->recommended_use  = $this->translate('recommended_use');
        $this->shipping_return  = $this->translate('shipping_return');
        $this->low_stock_level  = $this->get('low_stock_level');
        $this->out_stock_level  = $this->get('out_stock_level');
        $this->low_stock_msg    = 'This item is low on stock. Hurry! Place your orders quickly before we are completely out.';
        $this->images           = $this->images();
        $this->groups           = $this->groups();
        return $this;
    }

    /**
     * @param string $key
     * @return string
     */
    private function translate(string $key) {
        if ($this->_translate && isset($this->_translate->$key) && $this->_translate->$key) {
            return $this->_translate->$key;
        } else {
            return $this->get($key);
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
    public function retail_price() {
        return $this->_retail_price ? floatval($this->_retail_price->price) : 0;
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
     * @param float $price
     * @return string
     */
    public function format(float $price) {
        if ($this->_currency) {
            $price = number_format($price, $this->_currency->decimals);
            if ($this->_currency->formats) {
                return str_replace('{N}', $price, $this->_currency->formats);
            } else {
                return "{$this->_currency->symbol} {$price}";
            }
        } else {
            return '$' . number_format($price, 2);
        }
    }

    public function groups() {
        return ItemRelationGroups::Items($this->get('groups'), false);
    }

    public function images() {
        $images = $this->get('images');
        if (!$images) {
            $images[] = Nopic::ITEM;
        }
        return $images;
    }

    /**
     * @return Currency
     */
    private function _currency() {
        return Currency::Item($this->get('currency'), false);
    }

    /**
     * @return ItemTranslate
     */
    private function _translate() {
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
    private function _translates() {
        return ItemTranslate::Items($this->get('translates'), false);
    }

    /**
     * @return ItemPrice
     */
    private function _price() {
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
     * @return ItemPrice
     */
    private function _retail_price() {
        $level = $this->getParam('level', Rank::Unknown);
        $type  = ItemPriceType::Retail;
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
    private function _prices() {
        return ItemPrice::Items($this->get('prices'), false);
    }


}