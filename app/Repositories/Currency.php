<?php
/**
 * Created by PhpStorm.
 * User: hyeokchoi
 * Date: 2018. 8. 16.
 * Time: PM 5:10
 */

namespace App\Repositories;


/**
 * @property mixed id
 * @property mixed abbreviation
 * @property mixed decimals
 * @property mixed name
 * @property mixed symbol
 * @property mixed prefix
 * @property mixed suffix
 */
class Currency extends RepositoryAbstract {

    public function format(float $price) {
        $price = number_format($price, $this->decimals);
        if ($this->prefix || $this->suffix) {
            if ($this->prefix) {
                $price = "{$this->prefix}{$price}";
            }
            if ($this->suffix) {
                $price = "{$price}{$this->suffix}";
            }
            return $price;
        } else {
            return "{$this->symbol}{$price}";
        }
    }
}