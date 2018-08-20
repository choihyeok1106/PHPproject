<?php
/**
 * Created by PhpStorm.
 * User: hyeokchoi
 * Date: 2018. 8. 20.
 * Time: PM 6:19
 */

namespace App\Repositories;


class Phones implements IRepository
{
    public function transfer($unit)
    {
        // TODO: Implement transfer() method.
        foreach ($unit as $key => $value){
            $this->$key =$value;
        }
        return $this;
    }
}