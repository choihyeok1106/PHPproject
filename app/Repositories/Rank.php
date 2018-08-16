<?php
/**
 * Created by PhpStorm.
 * User: hyeokchoi
 * Date: 2018. 8. 14.
 * Time: PM 6:09
 */

namespace App\Repositories;


class Rank implements IRepository
{
    public function transfer($unit)
    {
        // TODO: Implement transfer() method.
        foreach ($unit as $key => $value ){
            $this->$key = $value;
        }
        return $this;

    }
}