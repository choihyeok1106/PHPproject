<?php
/**
 * Created by PhpStorm.
 * User: hyeokchoi
 * Date: 2018. 8. 9.
 * Time: PM 3:27
 */

namespace App\Repositories;


class legend implements IRepository
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