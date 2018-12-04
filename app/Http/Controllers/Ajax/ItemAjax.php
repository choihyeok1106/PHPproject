<?php
/**
 * Created by PhpStorm.
 * User: hook0
 * Date: 2018-11-15
 * Time: 16:32
 */

namespace App\Http\Controllers\Ajax;


use App\Cache\Cache;
use App\Cache\ItemCache;
use App\Demos\ItemData;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ItemAjax extends Controller {

    use Ajax;

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
            $categories = ItemCache::getCategories();
            return $this->ok($categories);
        }
        return $this->badRequest();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     * @throws \Throwable
     */
    public function items(Request $request) {
        if ($request->ajax()) {
            $data = ItemCache::getItems();
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