<?php
/**
 * Created by PhpStorm.
 * User: hyeokchoi
 * Date: 2018. 8. 16.
 * Time: AM 10:10
 */

namespace App\Repositories;


class Country implements IRepository
{
    public function transfer($unit)
    {
        // TODO: Implement transfer() method.
        foreach ($unit as $key => $value) {
            $this->$key = $value;
        }
        return $this;
    }
}