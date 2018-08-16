<?php
/**
 * Created by PhpStorm.
 * User: hyeokchoi
 * Date: 2018. 8. 8.
 * Time: PM 4:49
 */

namespace App\Repositories;


class Children implements IRepository
{
    public function transfer($unit)
    {
        // TODO: Implement transfer() method.
        foreach($unit as $key => $value){
             $this->$key = $value;
        }
        return $this;
    }
}