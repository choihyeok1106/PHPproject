<?php
/**
 * Created by PhpStorm.
 * User: hyeokchoi
 * Date: 2018. 8. 17.
 * Time: AM 10:26
 */

namespace App\Repositories;


class Package implements IRepository
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