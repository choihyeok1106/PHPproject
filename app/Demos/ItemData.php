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
use App\Repositories\ItemPrice;
use App\Repositories\ItemResource;

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
     * @param int $ln
     * @return mixed
     */
    public static function getProducts(int $ln = 24) {
        $data = [];
        for ($i = 0; $i < $ln; $i++) {
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

    /**
     * @param string $sku
     * @return Item
     */
    public static function getItem($sku = '') {
        $item        = new Item();
        $i           = rand(1, 9);
        $item->id    = $i;
        $item->sku   = $sku ? $sku : 'LP' . rand(1000, 9999) . $i;
        $item->title = "URE BlenderBottle® Classic {$i}";
        $item->image = "https://shop.livepure.co.kr/upfiles/product/main_4008_gs557k1_2.jpg";
        $item->price = rand(50, 500);
        $item->pv    = $item->price / 10;
        return $item;
    }

    /**
     * @return ItemResource[]
     */
    public static function getResources() {
        $data = [];

        $r      = new ItemResource();
        $r->url = 'https://extranet.securefreedom.com/GenesisPure/Shopping/Images/144_GoYin-single-420-blue_1.jpg';
        $data[] = $r;

        $r      = new ItemResource();
        $r->url = 'https://extranet.securefreedom.com/GenesisPure/Shopping/Images/145_GoYin_4pk_150_1.png';
        $data[] = $r;

        $r      = new ItemResource();
        $r->url = 'https://extranet.securefreedom.com/GenesisPure/Shopping/Images/158_GoYin_10pk_WithBox_150_1.png';
        $data[] = $r;

        $r      = new ItemResource();
        $r->url = 'https://extranet.securefreedom.com/GenesisPure/Shopping/Images/147_GoYin_40pk_WithBox_150_1.png';
        $data[] = $r;

        return $data;
    }

    /**
     * @return ItemPrice
     */
    public static function getPrice() {
        $p        = new ItemPrice();
        $p->price = 34.95;
        $p->qv    = 28;
        $p->cv    = 28;
        return $p;
    }

}