<?php
/**
 * Created by PhpStorm.
 * User: hyeokchoi
 * Date: 2018. 8. 17.
 * Time: AM 11:54
 */

namespace App\Repositories;


class Locale implements IRepository
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