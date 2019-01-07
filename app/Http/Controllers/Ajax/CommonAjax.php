<?php
/**
 * Created by PhpStorm.
 * User: hook0
 * Date: 2018-11-09
 * Time: 13:51
 */

namespace App\Http\Controllers\Ajax;


use Illuminate\Http\Request;

class CommonAjax extends AjaxController {

    public function lang(Request $request) {
        if ($request->ajax()) {
            return $this->ok(__('common'));
        }
        return $this->badRequest();
    }

    /**
     * get cart item count
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function cartCount(Request $request) {
        if ($request->ajax()) {
            $count = rand(0, 99);
            return $this->ok(['count' => $count]);
        }
        return $this->badRequest();
    }

    /**
     * get unread alert count
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function alertCount(Request $request) {
        if ($request->ajax()) {
            $count = rand(0, 99);
            return $this->ok(['count' => $count]);
        }
        return $this->badRequest();
    }

    /**
     * get unread notice count
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function noticeCount(Request $request) {
        if ($request->ajax()) {
            $count = rand(0, 99);
            return $this->ok(['count' => $count]);
        }
        return $this->badRequest();
    }

    /**
     * get unread message count
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function messageCount(Request $request) {
        if ($request->ajax()) {
            $count = rand(0, 99);
            return $this->ok(['count' => $count]);
        }
        return $this->badRequest();
    }

}