<?php
/**
 * Created by PhpStorm.
 * User: hook0
 * Date: 2018-11-19
 * Time: 10:42
 */

namespace App\Cache;


use App\Demos\ItemData;
use App\Repositories\Category;
use App\Repositories\Item;
use App\Supports\UserPrefs;

class ItemCache {

    /**
     * @return Category[]
     */
    public static function getCategories() {
        $key        = UserPrefs::getCountryLow() . ':categories';
        $categories = Cache::get($key);
        if (!$categories) {
            $categories = ItemData::getCategories();
            Cache::set($key, $categories);
        }
        return $categories;
    }

    /**
     * @param int    $category_id
     * @param int    $page
     * @param string $oder
     * @param string $by
     * @param string $query
     * @return mixed
     */
    public static function getProducts($category_id = 0, $page = 1, $oder = 'id', $by = 'desc', $query = '') {
        $key   = UserPrefs::getCountryLow() . ":products:{$category_id}:{$oder}:{$by}:$query:{$page}";
        $items = Cache::get($key);
        if (!$items) {
            $items = ItemData::getProducts();
            Cache::set($key, $items, 1800);
        }
        return $items;
    }

}