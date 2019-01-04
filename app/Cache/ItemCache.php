<?php
/**
 * Created by PhpStorm.
 * User: hook0
 * Date: 2018-11-19
 * Time: 10:42
 */

namespace App\Cache;


use App\Criterias\ItemsCriteria;
use App\Demos\ItemData;
use App\Repositories\Category;
use App\Services\ItemService;

class ItemCache {

    /**
     * @return Category[]
     */
    public static function categories() {
        $key        = Cache::key(':item:categories');
        $categories = Cache::get($key);
        if (!$categories) {
            $svc = ItemService::categories();
            return Cache::set($key, $svc->response());
        }
        return $categories;
    }

    /**
     * @param ItemsCriteria $c
     * @return mixed
     */
    public static function search(ItemsCriteria $c) {
        $key   = Cache::key([
            'item',
            $c->category,
            $c->legend,
            $c->type,
            $c->level,
            $c->virtual,
            $c->enrollment,
            $c->search,
            $c->targetneed,
            $c->tag,
            $c->order,
            $c->by,
            $c->limit,
            $c->page,
        ]);
        $items = Cache::get($key);
        if (!$items) {
            $svc = ItemService::search($c);
            return Cache::set($key, $svc->response());
        }
        return $items;
    }

    /**
     * @param $sku
     * @return mixed
     */
    public static function item($sku) {
        $key       = Cache::key(":item:{$sku}", false);
        $resources = Cache::get($key);
        if (!$resources) {
            $svc = ItemService::item($sku);
            return Cache::set($key, $svc->data());
        }
        return $resources;
    }

    /**
     * @param string $sku
     * @return \App\Repositories\ItemResource[]
     */
    public static function getResources($sku) {
        $key       = Cache::key(":item:{$sku}:resource");
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
        $key   = Cache::key(":item:{$sku}:price");
        $price = Cache::get($key);
        if (!$price) {
            $price = ItemData::getPrice();
        }
        return $price;
    }

}