<?php
/**
 * Author: R.j
 * Date: 2019-01-02 10:10
 * File: CategoryTranslate.php
 */

namespace App\Repositories;


/**
 * @property mixed locale
 * @property mixed name
 */
class CategoryTranslate extends RepositoryAbstract {

    /**
     * @return CategoryTranslate
     */
    public function transform() {
        $this->locale = $this->get('locale');
        $this->name   = $this->get('name');
        return $this;
    }
}