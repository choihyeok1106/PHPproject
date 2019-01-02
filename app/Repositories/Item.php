<?php
/**
 * Created by PhpStorm.
 * User: hyeokchoi
 * Date: 2018. 8. 8.
 * Time: PM 4:49
 */

namespace App\Repositories;


/**
 * @property mixed sku
 * @property mixed country
 * @property mixed title
 * @property mixed image
 * @property mixed price
 * @property mixed cv
 * @property mixed qv
 * @property mixed freeshipping
 */
class Item extends RepositoryAbstract {

    /**
     * @return Item
     */
    public function transform() {
        $this->sku          = $this->get('sku');
        $this->title        = $this->get('title');
        $this->image        = $this->get('image');
        $this->price        = $this->get('price');
        $this->cv           = $this->get('cv');
        $this->qv           = $this->get('qv');
        $this->freeshipping = $this->get('free_shipping');
        return $this;
    }

    /**
     * @return CategoryTranslate
     */
    public function translate() {
        $translates = $this->translates();
        foreach ($translates as $translate) {
            if ($this->locale == $translate->locale) {
                return $translate;
            }
        }
        return null;
    }

    /**
     * @return CategoryTranslate[]
     */
    public function translates() {
        return ItemTranslate::Items($this->get('translates'), false);
    }
}