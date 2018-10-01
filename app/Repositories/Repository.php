<?php
/**
 * Created by PhpStorm.
 * User: yoonpooh
 * Date: 2018. 6. 19.
 * Time: PM 4:31
 */

namespace App\Repositories;


class Repository
{
    public function convert($array, $class_name)
    {
        $repositories = array();
        if (class_exists('\\App\\Repositories\\' . $class_name) && is_array($array)) {
            if (empty($array[0]))
                $array = array($array);
            if (count($array) > 0) {
                foreach ($array as $key => $unit) {
                    if (is_array($unit))
                        $repositories[] = $this->put($unit, $class_name);
                }
            }
        }

        if (count($repositories) == 1) {
            $repositories = $repositories[0];
        }
        return $repositories;
    }

    private function put($unit, $class_name)
    {
        $class_name = 'App\\Repositories\\' . $class_name;
        $repository = new $class_name();
        if (method_exists($repository, 'transfer')) {
            $repository = $repository->transfer($unit);
        }
        return $repository;
    }
}