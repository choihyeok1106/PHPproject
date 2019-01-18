<?php
/**
 * Author: R.j
 * Date: 2019-01-15 12:25
 * File: ShippingCriteria.php
 */

namespace App\Criterias;


/**
 * @property mixed country
 * @property mixed state
 * @property mixed city
 * @property mixed county
 * @property mixed zipcode
 * @property mixed orders
 * @property mixed autoship
 * @property mixed signup
 * @property mixed reps
 * @property mixed customers
 * @property mixed type
 * @property mixed legend
 */
class ShippingCriteria extends Criteria {

    public $items = [];

    /**
     * @return array
     */
    public function methods() {
        return [
            'country' => $this->country,
            'state'   => $this->state,
            'city'    => $this->city,
            'county'  => $this->county,
            'zipcode' => $this->zipcode,
            'items'   => $this->items(),
        ];
    }

    /**
     * @return array
     */
    private function items() {
        return is_array($this->items) ? $this->items : [];
    }

}