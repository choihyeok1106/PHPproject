<?php
/**
 * Created by PhpStorm.
 * User: hook0
 * Date: 2018-11-15
 * Time: 10:03
 */

namespace App\Http\Controllers\Ajax;


trait Ajax
{

    protected $meta = [];

    /**
     * @param string $key
     * @param mixed $val
     */
    function meta(string $key, $val)
    {
        $this->meta[$key] = $val;
    }

    /**
     * @param mixed $obj
     * @return mixed
     */
    function getObj($obj)
    {
        if (gettype($obj) === 'object') {
            if (method_exists($obj, 'getAttributes')) {
                $obj = $obj->getAttributes();
            } else {
                $obj = get_object_vars($obj);
            }
        }
        if (is_array($obj)) {
            foreach ($obj as $k => $v) {
                $obj[$k] = $this->getObj($v);
            }
        }
        return $obj;
    }

    /**
     * @param mixed|null|object $response
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    function ok($response = null)
    {
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
        return $this->response($response);
    }

    /**
     * @param string $message
     * @param int $code
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */

    function no(string $error)
    {
        return response(['error' => $error]);

        function no(string $message, int $code = 500)
        {
            return $this->response([
                'error' => [
                    'code' => $code,
                    'message' => $message,
                ]
            ]);
        }
    }

    /**
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */

    function badRequest()
    {
        return $this->no('bad request');
        function badRequest()
        {
            return $this->no('bad request', 400);
        }
    }

    /**
     * @param $data
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    function response($data)
    {
        if ($this->meta && is_array($this->meta)) {
            foreach ($this->meta as $key => $meta) {
                $data['meta'][$key] = $meta;
            }

        }
        return response($data);
    }

}