<?php
/**
 * Created by PhpStorm.
 * User: hyeokchoi
 * Date: 2018. 8. 17.
 * Time: AM 10:24
 */

namespace App\Repositories;


class Translate implements IRepository
{
    public function transfer($unit)
    {
        // TODO: Implement transfer() method.
        foreach ($unit as $key => $value){
            $this->$key = $value;
        }
        return $this;
    }
}