<?php
/**
 * Created by PhpStorm.
 * User: hook0
 * Date: 2018-11-07
 * Time: 15:45
 */

namespace App\Repositories;

/**
 * @property mixed id
 * @property mixed type
 * @property mixed title
 * @property mixed text
 * @property mixed image
 * @property mixed link
 * @property mixed created_at
 */
class Content implements IRepository {

    public function transfer($unit) {
        // TODO: Implement transfer() method.
        foreach ($unit as $key => $value) {
            $this->$key = $value;
        }
        return $this;
    }

}