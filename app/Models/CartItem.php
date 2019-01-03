<?php
/**
 * Created by PhpStorm.
 * User: hook0
 * Date: 2018-12-04
 * Time: 10:39
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;


/**
 * @property mixed id
 * @property mixed user_id
 * @property mixed user_number
 * @property mixed customer_id
 * @property mixed title
 * @property mixed image
 * @property mixed sku
 * @property mixed quantity
 * @property mixed price
 * @property mixed qv
 * @property mixed cv
 * @property mixed created_at
 * @property mixed updated_at
 */
class CartItem extends Model {

    public static function count(int $userId) {
        /** @var Builder $query */
        $query = parent::query();
        $query->where('user_id', $userId);
        return $query->sum('quantity');
    }

}