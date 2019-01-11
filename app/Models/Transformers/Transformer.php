<?php
/**
 * Author: R.j
 * Date: 2019-01-11 14:26
 * File: BaseTransformer.php
 */

namespace App\Models\Transformers;


class Transformer {

    /**
     * @return $this
     */
    public static function new() {
        $called_class = get_called_class();
        return new $called_class;
    }

    /**
     * @param mixed $obj
     * @return mixed
     */
    public function transform($obj) {
        return $obj;
    }

    /**
     * @param mixed  $item
     * @param string $method
     * @return mixed
     */
    public static function collection($item, string $method = 'transform') {
        $cls = self::new();
        if (method_exists($cls, $method)) {
            return $cls->$method($item);
        }
        return null;
    }

    /**
     * @param mixed  $items
     * @param string $method
     * @return array
     */
    public static function collections($items, string $method = 'transform') {
        $data = [];
        if (get_class($items) == 'Illuminate\Database\Eloquent\Collection' || is_array($items)) {
            foreach ($items as $item) {
                $val = self::collection($item, $method);
                if ($val != null) {
                    $data[] = $val;
                }
            }
        }
        return $data;
    }

}