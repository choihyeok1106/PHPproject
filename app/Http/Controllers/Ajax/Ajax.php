<?php
/**
 * Created by PhpStorm.
 * User: hook0
 * Date: 2018-11-15
 * Time: 10:03
 */

namespace App\Http\Controllers\Ajax;


trait Ajax {

    /**
     * @param mixed|null $response
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    function ok($response = null) {
        if ($response === null) {
            $response['message'] = 'ok';
        }
        return response($response);
    }

    /**
     * @param string $error
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    function error($error) {
        return response(['error' => $error]);
    }

    /**
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    function badRequest() {
        return $this->error('bad request');
    }

}