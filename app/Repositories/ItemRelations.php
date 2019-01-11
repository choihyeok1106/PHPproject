<?php
/**
 * Author: R.j
 * Date: 2019-01-04 18:32
 * File: ItemRelations.php
 */

namespace App\Repositories;


/**
 * @property null sku
 * @property null title
 * @property null image
 */
class ItemRelations extends RepositoryAbstract {

    /**
     * @return ItemRelations
     */
    public function transform() {
        $this->sku   = $this->get('sku');
        $this->title = $this->get('title');
        $this->image = $this->image();
        return $this;
    }

    private function image() {
        $image = $this->get('image');
        if (!$image) {
            $image = '/img/nopic_product.jpg';
        }
        return $image;
    }

}