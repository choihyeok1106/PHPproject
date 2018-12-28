<?php
/**
 * Created by PhpStorm.
 * User: hook0
 * Date: 2018-11-15
 * Time: 16:32
 */

namespace App\Http\Controllers\Ajax;


use App\Cache\ItemCache;
use App\Constants\ItemLegend;
use App\Constants\ItemPriceType;
use App\Criterias\ItemsCriteria;
use App\Demos\ItemData;
use App\Repositories\Category;
use App\Supports\UserPrefs;
use Illuminate\Http\Request;

class ItemAjax extends AjaxController {

    /**
     * HomeAjax constructor.
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function categories(Request $request) {
        if ($request->ajax()) {
            $data = ItemCache::getCategories();
            $data = Category::Items($data);
            return $this->ok($data);
        }
        return $this->badRequest();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     * @throws \Throwable
     */
    public function index(Request $request) {
        if ($request->ajax()) {
            /** @var ItemsCriteria $c */
            $c             = ItemsCriteria::new();
            $c->page       = 1;
            $c->category   = $this->int('category', 0, 0);
            $c->search     = $this->string('search');
            $c->sorting    = $this->string('sorting');
            $c->tag        = '';
            $c->limit      = 24;
            $c->level      = UserPrefs::level();
            $c->type       = ItemPriceType::Wholesale;
            $c->legend     = ItemLegend::Product;
            $c->targetneed = '';
            $c->virtual    = 0;
            $c->enrollment = 0;
            $data          = ItemCache::getItems($c);
            return $this->ok($data);
        }
        return $this->badRequest();
    }

    /**
     * @param Request $request
     * @param string  $sku
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function item(Request $request, $sku) {
        if ($request->ajax()) {
            return $this->ok(['sku' => $sku]);
        }
        return $this->badRequest();
    }

    /**
     * @param Request $request
     * @param string  $sku
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function resource(Request $request, $sku) {
        if ($request->ajax()) {
            $data = ItemCache::getResources($sku);
            return $this->ok($data);
        }
        return $this->badRequest();
    }

    /**
     * @param Request $request
     * @param string  $sku
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function price(Request $request, $sku) {
        if ($request->ajax()) {
            $data = ItemCache::getPrice($sku);
            return $this->ok($data);
        }
        return $this->badRequest();
    }

    /**
     * @param Request $request
     * @param string  $sku
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function detail(Request $request, $sku) {
        if ($request->ajax()) {
            $data = ItemCache::getProducts();
            return $this->ok($data['items']);
        }
        return $this->badRequest();
    }

    /**
     * @param Request $request
     * @param string  $sku
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function options(Request $request, string $sku) {
        if ($request->ajax()) {
            $data = ItemData::getProducts(4);
            return $this->ok($data['items']);
        }
        return $this->badRequest();
    }

    /**
     * @param Request $request
     * @param string  $sku
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function supplement(Request $request, $sku) {
        if ($request->ajax()) {
            $data = ItemCache::getItems();
            return $this->ok($data['items']);
        }
        return $this->badRequest();
    }

    /**
     * @param Request $request
     * @param string  $sku
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function relates(Request $request, $sku) {
        if ($request->ajax()) {
            $data = ItemCache::getItems();
            return $this->ok($data['items']);
        }
        return $this->badRequest();
    }

}