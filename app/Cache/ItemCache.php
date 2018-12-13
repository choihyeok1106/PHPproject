<?php
/**
 * Created by PhpStorm.
 * User: hook0
 * Date: 2018-11-19
 * Time: 10:42
 */

namespace App\Cache;


use App\Demos\ItemData;
use App\Models\HomeInterface;
use App\Repositories\Category;
use App\Repositories\Item;
use App\Supports\UserPrefs;

class ItemCache {

    /**
     * @return Category[]
     */
    public static function getCategories() {
        $key        = UserPrefs::getCountryLow() . ':item:categories';
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
    public static function getItems($category_id = 0, $page = 1, $oder = 'id', $by = 'desc', $query = '') {
        $key   = UserPrefs::getCountryLow() . ":item:{$category_id}:{$oder}:{$by}:$query:{$page}";
        $items = Cache::get($key);
        if (!$items) {
            $items = ItemData::getProducts();
            Cache::set($key, $items, 1800);
        }
        return $items;
    }

    public static function getItem($sku) {
        $key       = UserPrefs::getCountryLow() . ":item:{$sku}";
        $resources = Cache::get($key);
        if (!$resources) {
            $resources = ItemData::getItem($sku);
        }
        return $resources;
    }

    /**
     * @param string $sku
     * @return \App\Repositories\ItemResource[]
     */
    public static function getResources($sku) {
        $key       = UserPrefs::getCountryLow() . ":item:{$sku}:resource";
        $resources = Cache::get($key);
        if (!$resources) {
            $resources = ItemData::getResources();
        }
        return $resources;
    }

    /**
     * @param $sku
     * @return \App\Repositories\ItemPrice
     */
    public static function getPrice($sku) {
        $key   = UserPrefs::getCountryLow() . ":item:{$sku}:price";
        $price = Cache::get($key);
        if (!$price) {
            $price = ItemData::getPrice();
        }
        return $price;
    }

}