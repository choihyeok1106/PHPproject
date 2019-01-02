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
 */
class ItemTranslate extends RepositoryAbstract {

    /**
     * @return ItemTranslate
     */
    public function transform() {
        $this->locale = $this->get('locale');
        $this->title   = $this->get('title');
        return $this;
    }
}