<?php
/**
 * Created by PhpStorm.
 * User: yoonpooh
 * Date: 2018. 6. 19.
 * Time: PM 4:49
 */

namespace App\Repositories;


interface IRepository
{
    /**
     * @param $unit array
     * @return mixed
     */
    public function transfer($unit);
}