<?php
/**
 * Created by PhpStorm.
 * User: hyeokchoi
 * Date: 2018. 8. 16.
 * Time: PM 5:12
 */

namespace App\Repositories;


class Price implements IRepository{
    public function transfer($unit)
    {
        // TODO: Implement transfer() method.
        foreach ($unit as $key => $value){
            $this->$key = $value;
        }
        return $this;
    }
}