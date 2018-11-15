<?php
/**
 * Created by PhpStorm.
 * User: hyeokchoi
 * Date: 2018. 8. 16.
 * Time: PM 3:11
 */

namespace App\Service;


use App\Repositories\Category;
use App\Supports\APIResources;

class ItemService extends Service {

    public function getCategories() {
        $categories = [];

        $c            = new Category();
        $c->name      = 'Bestsellers';
        $categories[] = $c;

        $c            = new Category();
        $c->name      = 'Weight Loss';
        $categories[] = $c;

        $c            = new Category();
        $c->name      = 'Sports Performance';
        $categories[] = $c;

        $c            = new Category();
        $c->name      = 'Nutrition';
        $categories[] = $c;

        $c            = new Category();
        $c->name      = 'Energy';
        $categories[] = $c;

        $c            = new Category();
        $c->name      = 'Superfruits';
        $categories[] = $c;

        $c            = new Category();
        $c->name      = 'Skincare';
        $categories[] = $c;

        $c            = new Category();
        $c->name      = 'PURE Enrollment Packs';
        $categories[] = $c;

        $c            = new Category();
        $c->name      = 'Water Filtration';
        $categories[] = $c;

        $c            = new Category();
        $c->name      = 'Last Chance';
        $categories[] = $c;

        return $categories;

        $this->url  = APIResources::GET_ITEM_CATEGORIES;
        $result     = $this->get();
        $categories = $this->repository->convert($result->response['items'], 'Category');
        return $categories;
    }

    public function getItem($sku) {
        $this->url = APIResources::format(APIResources::GET_ITEM, $sku);
        $result    = $this->get();
        print_r($result->response);
        $items = $this->repository->convert($result->response, 'Item');
        return $items;
    }

    public function getItems() {
        $this->url = APIResources::GET_ITEMS;
        $result    = $this->get();
        $item      = $this->repository->convert($result->response['items'], 'Item');
        return $item;
    }

    public function legend() {
        $this->url = APIResources::GET_ITEMS_LEGENDS;
        $result    = $this->get();
        $legend    = $this->repository->convert($result->response['items']);
    }

    public function getTranslate($sku) {
        $this->url = APIResources::format(APIResources::GET_TRANSLATES, $sku);
        $result    = $this->get();
        $translate = $this->repository->convert($result->response, 'Item');
        return $translate;
    }

    public function getCountry($sku) {
        $this->url = APIResources::format(APIResources::GET_COUNTRIES, $sku);
        $result    = $this->get();
        $country   = $this->repository->convert($result->response, 'Item');
        return $country;
    }

    public function getPrice($sku) {
        $this->url = APIResources::format(APIResources::GET_PRICES, $sku);
        $result    = $this->get();
        $prices    = $this->repository->convert($result->response, 'Price');
        return $prices;
    }

    public function getPackage($sku) {
        $this->url = APIResources::format(APIResources::GET_PACKAGES, $sku);
        $result    = $this->get();
        $pakage    = $this->repository->convert($result->response, 'Package');
    }
}