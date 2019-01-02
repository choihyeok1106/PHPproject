<?php
/**
 * Author: R.j
 * Date: 2018-12-28 15:00
 * File: ItemsCriteria.php
 */

namespace App\Criterias;


/**
 * @property int    category
 * @property string search
 * @property string sorting
 * @property string order
 * @property string by
 * @property int    page
 * @property string tag
 * @property int    limit
 * @property int    level
 * @property int    type
 * @property int    legend
 * @property string targetneed
 * @property int    virtual
 * @property int    enrollment
 */
class ItemsCriteria extends CriteriaAbstract {

    public function order() {
        switch (substr($this->sorting, 0, 1)) {
            case 'n':
                return 'name';
            case 'q':
                return 'qv';
            case 'p':
                return 'price';
            default:
                return 'id';
        }
    }

    public function by() {
        return substr($this->sorting, -1) === 'd' ? 'desc' : 'asc';
    }

}