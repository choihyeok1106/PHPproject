<?php
/**
 * Author: R.j
 * Date: 2019-01-14 15:05
 * File: Address.php
 */

namespace App\Repositories;


class Address extends RepositoryAbstract {

    public function getAddr() {
        $this->button = 'Deliver to this address';
        return $this;
    }

}