<?php
/**
 * Author: R.j
 * Date: 2019-01-14 15:23
 * File: AddressCollection.php
 */

namespace App\Repositories\Collections;


use App\Repositories\Address;

class AddressCollection {

    /** @var Address[] $_data */
    private $_data;
    private $_meta;

    function __construct($data) {
        $result = Address::Items($data);
        if (isset($result['data'])) {
            $this->_data = $result['data'];
        }
        if (isset($result['meta'])) {
            $this->_meta = $result['meta'];
        }
    }

    /**
     * @param $data
     * @return AddressCollection
     */
    public static function new($data) {
        return new AddressCollection($data);
    }

    /**
     * @param int $type
     * @return array
     */
    public function items(int $type) {
        $data = [];
        foreach ($this->_data as $address) {
            if ($address->type == $type) {
                $data[]          = $address->getAddr();
            }
        }
        return $data;
    }

    /**
     * @param int $type
     * @return Address|null
     */
    public function default(int $type) {
        if ($this->_data) {
            foreach ($this->_data as $address) {
                if ($address->type == $type && $address->default) {
                    return $address;
                }
            }
        }
        return null;
    }

}