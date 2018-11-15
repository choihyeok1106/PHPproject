<?php
/**
 * Created by PhpStorm.
 * User: hook0
 * Date: 2018-11-15
 * Time: 16:32
 */

namespace App\Http\Controllers\Ajax;


use App\Http\Controllers\Controller;
use App\Service\ItemService;
use Illuminate\Http\Request;

class ProductAjax extends Controller {

    use Ajax;

    /** @var ItemService $service */
    private $service;

    /**
     * HomeAjax constructor.
     */
    public function __construct() {
        $this->middleware('auth');
        $this->service = new ItemService();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function categories(Request $request) {
        if ($request->ajax()) {
            $categories = $this->service->getCategories();
            return $this->ok($categories);
        }
        return $this->badRequest();
    }

}