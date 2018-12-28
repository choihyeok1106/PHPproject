<?php
/**
 * Author: R.j
 * Date: 2018-12-28 17:32
 * File: AjaxController.php
 */

namespace App\Http\Controllers\Ajax;


use App\Http\Controllers\Controller;
use App\Supports\Requests;

class AjaxController extends Controller {

    use Requests;

    protected $_meta = [];

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * @param string $key
     * @param mixed  $val
     */
    protected function meta(string $key, $val) {
        $this->_meta[$key] = $val;
    }

    /**
     * @param mixed $obj
     * @return mixed
     */
    private function _vars($obj) {
        if (gettype($obj) === 'object') {
            if (method_exists($obj, 'getAttributes')) {
                $obj = $obj->getAttributes();
            } else {
                $obj = get_object_vars($obj);
            }
        }
        if (is_array($obj)) {
            foreach ($obj as $k => $v) {
                $obj[$k] = $this->_vars($v);
            }
        }
        return $obj;
    }

    /**
     * @param mixed|null|object $response
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    protected function ok($response = null) {
        if ($response === null) {
            $response['message'] = 'ok';
        } else {
            if (islist($response)) {
                foreach ($response as $k => $v) {
                    $response[$k] = $this->_vars($v);
                }
            } else {
                $response = $this->_vars($response);
            }
        }
        return $this->response($response);
    }

    /**
     * @param string $message
     * @param int    $code
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    protected function no(string $message, int $code = 500) {
        return $this->response([
            'error' => [
                'code'    => $code,
                'message' => $message,
            ]
        ]);
    }

    /**
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    protected function badRequest() {
        return $this->no('bad request', 400);
    }

    /**
     * @param $data
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    protected function response($data) {
        if (is_array($this->_meta)) {
            foreach ($this->_meta as $key => $meta) {
                $data['meta'][$key] = $meta;
            }
        }
        return response($data);
    }

}