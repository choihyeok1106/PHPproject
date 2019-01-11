<?php
/**
 * Author: R.j
 * Date: 2018-12-28 15:00
 * File: ItemsCriteria.php
 */

namespace App\Criterias;


/**
 * @property mixed category
 * @property mixed search
 * @property mixed sorting
 * @property mixed order
 * @property mixed by
 * @property mixed page
 * @property mixed tag
 * @property mixed limit
 * @property mixed level
 * @property mixed type
 * @property mixed legend
 * @property mixed targetneed
 * @property mixed virtual
 * @property mixed enrollment
 */
class ItemsCriteria extends CriteriaAbstract {

    public function order() {
        switch (substr($this->sorting, 0, 1)) {
            case 'n':
                return 'name';
            case 'q':
                return 'qv';
            case 'c':
                return 'cv';
            case 'p':
                return 'price';
            default:
                return 'id';
        }
    }

    public function by() {
        return substr($this->sorting, -1) === 'd' ? 'desc' : 'asc';
    }

    public function query($query) {
        $query   = str_replace('?', '', $query);
        $queries = explode('&', $query);
        foreach ($queries as $q) {
            list($k, $v) = explode('=', $q);
            $this->$k = $v;
        }
    }

    /**
     * @return array
     */
    public function search() {
        return [
            'category'   => $this->category,
            'search'     => $this->search,
            'order'      => $this->order,
            'by'         => $this->by,
            'tag'        => $this->tag,
            'targetneed' => $this->targetneed,
            'limit'      => $this->limit,
            'level'      => $this->level,
            'type'       => $this->type,
            'legend'     => $this->legend,
            'virtual'    => $this->virtual,
            'enrollment' => $this->enrollment,
            'page'       => $this->page,
        ];
    }

    public function items() {
        return [
            'type'   => $this->type,
            'legend' => $this->legend,
            'sku'    => is_array($this->search) ? implode(',', $this->search) : '',
        ];
    }
}