<?php
/**
 * Created by PhpStorm.
 * User: hook0
 * Date: 2018-11-09
 * Time: 13:51
 */

namespace App\Http\Controllers\Ajax;



class CommonAjax extends AjaxController {

    public function lang() {
        return $this->ok(__('common'));
    }

    /**
     * get cart item count
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function cartCount() {
        $count = rand(0, 99);
        return $this->ok(['count' => $count]);
    }

    /**
     * get unread alert count
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function alertCount() {
        $count = rand(0, 99);
        return $this->ok(['count' => $count]);
    }

    /**
     * get unread notice count
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function noticeCount() {
        $count = rand(0, 99);
        return $this->ok(['count' => $count]);
    }

    /**
     * get unread message count
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function messageCount() {
        $count = rand(0, 99);
        return $this->ok(['count' => $count]);
    }

}