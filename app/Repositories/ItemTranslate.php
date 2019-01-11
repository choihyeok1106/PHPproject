<?php
/**
 * Author: R.j
 * Date: 2019-01-02 10:11
 * File: ItemTranslate.php
 */

namespace App\Repositories;


/**
 * @property mixed locale
 * @property mixed title
 * @property mixed explanation
 * @property mixed long_explanation
 * @property mixed supplement_facts
 * @property mixed recommended_use
 * @property mixed shipping_return
 */
class ItemTranslate extends RepositoryAbstract {

    /**
     * @return ItemTranslate
     */
    public function transform() {
        $this->locale           = $this->get('locale');
        $this->title            = $this->get('title');
        $this->explanation      = $this->get('explanation');
        $this->long_explanation = $this->get('long_explanation');
        $this->supplement_facts = $this->get('supplement_facts');
        $this->recommended_use  = $this->get('recommended_use');
        $this->shipping_return  = $this->get('shipping_return');
        return $this;
    }
}