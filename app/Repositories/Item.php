<?php
/**
 * Created by PhpStorm.
 * User: hyeokchoi
 * Date: 2018. 8. 8.
 * Time: PM 4:49
 */

namespace App\Repositories;


class Item implements IRepository
{
    public function transfer($unit)
    {
        // TODO: Implement transfer() method.
        foreach ($unit as $key => $value) {
            switch ($key) {
                case 'countries':
                    $country = new Country();
                    $country->transfer($value);
                    $this->country = $country;
                    break;
                case 'legend':
                    $this->legends = new Legend();
                    foreach ($value as $_key => $_value) {
                        $legend = new Legend();
                        $legend->transfer($_value);
                        $this->legends->$key = $legend;
                    }
                    break;
                case 'currency':
                    $currency = new Currency();
                    $currency->transfer($value);
                    $this->currency = $currency;
                    break;
                case 'prices':
                    $this->prices = new Price();
                    foreach ($value as $_key => $_value) {
                        $price = new Price();
                        $price->transfer($_value);
                        $this->prices->$key = $price;
                    }
                    break;
                    default:
                        $this->$key = $value;
                        break;
            }
        }
        return $this;
    }
}