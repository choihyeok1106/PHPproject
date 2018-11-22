<?php
/**
 * Created by PhpStorm.
 * User: hook0
 * Date: 2018-11-19
 * Time: 10:35
 */

namespace App\Demos;


use App\Repositories\Category;
use App\Repositories\Item;

class ItemData {

    /**
     * @return Category[]
     */
    public static function getCategories() {
        $categories = [];

        $c            = new Category();
        $c->id        = 1;
        $c->name      = 'Bestsellers';
        $categories[] = $c;

        $c            = new Category();
        $c->id        = 2;
        $c->name      = 'Weight Loss';
        $categories[] = $c;

        $c            = new Category();
        $c->id        = 3;
        $c->name      = 'Sports Performance';
        $categories[] = $c;

        $c            = new Category();
        $c->id        = 4;
        $c->name      = 'Nutrition';
        $categories[] = $c;

        $c            = new Category();
        $c->id        = 5;
        $c->name      = 'Energy';
        $categories[] = $c;

        $c            = new Category();
        $c->id        = 6;
        $c->name      = 'Superfruits';
        $categories[] = $c;

        $c            = new Category();
        $c->id        = 7;
        $c->name      = 'Skincare';
        $categories[] = $c;

        $c            = new Category();
        $c->id        = 8;
        $c->name      = 'PURE Enrollment Packs';
        $categories[] = $c;

        $c            = new Category();
        $c->id        = 9;
        $c->name      = 'Water Filtration';
        $categories[] = $c;

        $c            = new Category();
        $c->id        = 10;
        $c->name      = 'Last Chance';
        $categories[] = $c;

        return $categories;
    }

    /**
     * @return mixed
     */
    public static function getProducts() {
        $data = [];
        for ($i = 0; $i < 24; $i++) {
            $item = new Item();

            $item->id    = $i;
            $item->sku   = 'LP' . rand(1000, 9999) . $i;
            $item->title = "URE BlenderBottle® Classic {$i}";
            $item->image = "https://shop.livepure.co.kr/upfiles/product/main_4008_gs557k1_2.jpg";
            $item->price = rand(50, 500);
            $item->pv    = $item->price / 10;

            $data['items'][] = $item;
        }
        $data['pagination'] = [
            "total"        => 73,
            "count"        => 30,
            "per_page"     => 30,
            "current_page" => 1,
            "total_pages"  => 3,
            "links"        => [
                "next" => "https://dev-core.puremeka.com/v1/items?page=2"
            ]
        ];
        return $data;
    }

}