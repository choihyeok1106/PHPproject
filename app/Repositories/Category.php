<?php
/**
 * Created by PhpStorm.
 * User: hyeokchoi
 * Date: 2018. 8. 8.
 * Time: PM 6:16
 */

namespace App\Repositories;


class Category implements IRepository
{
    public function transfer($unit)
    {
        // TODO: Implement transfer() method.
        foreach ($unit as $key => $value) {
            switch ($key) {
                case 'children':
                    $children = new Children();
                    $children->transfer($value);
                    $this->children = $children;
                break;
                case 'Item':
                    $item = new Item();
                    $item->transfer($value);
                    $this->item = $item;
                default:
                    $this->$key = $value;
                    break;
            }
        }
        return $this;
    }
}