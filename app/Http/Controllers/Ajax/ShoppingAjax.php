<?php
/**
 * Created by PhpStorm.
 * User: hook0
 * Date: 2018-12-05
 * Time: 13:47
 */

namespace App\Http\Controllers\Ajax;


use App\Demos\PromotionData;
use Illuminate\Http\Request;

class ShoppingAjax extends AjaxController {


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function promotions(Request $request) {
        if ($request->ajax()) {
            $promotions = PromotionData::getPromotions();
            return $this->ok($promotions);
        }
        return $this->badRequest();
    }

}