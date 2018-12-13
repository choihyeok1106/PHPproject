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
     * @param mixed $obj
     * @return mixed
     */
    function getObj($obj) {
        if (gettype($obj) === 'object') {
            if (method_exists($obj, 'getAttributes')) {
                $obj = $obj->getAttributes();
            } else {
                $obj = get_object_vars($obj);
            }
        }
        return $obj;
    }

    /**
     * @param mixed|null|object $response
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    function ok($response = null) {
        if ($response === null) {
            $response['message'] = 'ok';
        } else {
            if (is_array($response) && isset($response[0])) {
                foreach ($response as $k => $v) {
                    $response[$k] = $this->getObj($v);
                }
            } else {
                $response = $this->getObj($response);
            }
        }
        return response($response);
    }

    /**
     * @param string $error
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    function no(string $error) {
        return response(['error' => $error]);
    }

    /**
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    function badRequest() {
        return $this->no('bad request');
    }

}