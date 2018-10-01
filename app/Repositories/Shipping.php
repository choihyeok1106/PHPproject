<?php
/**
 * Created by PhpStorm.
 * User: hyeokchoi
 * Date: 2018. 8. 21.
 * Time: PM 3:28
 */

namespace App\Repositories;


class Shipping implements IRepository
{
    public function transfer($unit)
    {
        // TODO: Implement transfer() method.
        foreach ($unit as $key=>$value){
            $this->$key = $value;
        }
        return $this;
    }
}