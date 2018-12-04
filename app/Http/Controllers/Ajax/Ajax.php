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
     * @param mixed|null|object $response
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    function ok($response = null) {
        if ($response === null) {
            $response['message'] = 'ok';
        } else {
            if (gettype($response) === 'object') {
                if (method_exists($response, 'getAttributes')) {
                    $response = $response->getAttributes();
                } else {
                    $response = get_object_vars($response);
                }
            }
        }
        return response($response);
    }

    /**
     * @param string $error
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    function no($error) {
        return response(['error' => $error]);
    }

    /**
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    function badRequest() {
        return $this->no('bad request');
    }

}