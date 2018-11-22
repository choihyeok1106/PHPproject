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
            $data = ItemCache::getProducts();
            return $this->ok($data);
        }
        return $this->badRequest();
    }

}