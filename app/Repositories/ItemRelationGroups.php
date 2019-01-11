<?php
/**
 * Author: R.j
 * Date: 2019-01-04 18:29
 * File: ItemRelationGroups.php
 */

namespace App\Repositories;


/**
 * @property null  id
 * @property null  name
 * @property array items
 */
class ItemRelationGroups extends RepositoryAbstract {

    /**
     * @return ItemRelationGroups
     */
    public function transform() {
        $this->id    = $this->get('id');
        $this->name  = $this->get('name');
        $this->items = $this->_items();
        return $this;
    }

    private function _items() {
        return ItemRelations::Items($this->get('items'), false);
    }

}