<?php

namespace App\Repositories;


class RepType implements IRepository
{
    /**
     * @param $unit array
     * @return mixed
     */
    public function transfer($unit)
    {
        // TODO: Implement transfer() method.
        foreach ($unit as $key => $value) {
            $this->$key = $value;
        }
        return $this;
    }
}