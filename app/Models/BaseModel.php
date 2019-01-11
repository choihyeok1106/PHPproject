<?php
/**
 * Author: R.j
 * Date: 2019-01-09 14:22
 * File: BaseModel.php
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;


/**
 * @property mixed  id
 * @property Carbon created_at
 * @property Carbon updated_at
 * @property Carbon deleted_at
 * @property int    deleted
 * @property int    sorting
 */
class BaseModel extends Model {

    /**
     * @return $this
     */
    public static function new() {
        $called_class = get_called_class();
        return new $called_class;
    }

    /**
     * @param string $table
     * @param string $proto
     * @return bool
     */
    public static function mkTable(string $table, string $proto) {
        return DB::statement("CREATE TABLE IF NOT EXISTS {$table} LIKE {$proto}");
    }

}