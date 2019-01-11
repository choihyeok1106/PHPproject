<?php
/**
 * Author: R.j
 * Date: 2018-12-28 17:32
 * File: AjaxController.php
 */

namespace App\Http\Controllers\Ajax;


use Illuminate\Routing\Controller as BaseController;
use App\Supports\Requests;

class AjaxController extends BaseController {

    use Requests;

    protected $_meta = [];

    public $skipActions;

    /**
     * AjaxController constructor.
     */
    public function __construct() {
        if (!$this->ajax()) {
            abort(404);
        }
        $this->middleware('auth');
    }

    /**
     * @param string $key
     * @param mixed  $val
     * @return AjaxController
     */
    protected function meta(string $key, $val) {
        $this->_meta[$key] = $val;
        return $this;
    }

    /**
     * @param mixed $metas
     * @return AjaxController
     */
    protected function metas($metas = null) {
        if (gettype($metas) == 'object') {
            $metas = get_object_vars($metas);
        }
        if (is_array($metas)) {
            foreach ($metas as $k => $v) {
                $this->meta($k, $v);
            }
        }
        return $this;
    }

    /**
     * @param mixed|null|object $response
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    protected function ok($response = null) {
        if (is_array($response) && isset($response['error'])) {
            return $this->no($response);
        }
        if ($response === null) {
            $response['message'] = 'ok';
        }
        $meta = [];
        $data = null;
        if (is_array($response)) {
            $meta = isset($response['meta']) ? $response['meta'] : [];
            $data = isset($response['data']) ? $response['data'] : $response;
        } else {
            $data = $response;
        }
        if (is_array($this->_meta)) {
            foreach ($this->_meta as $k => $v) {
                $meta[$k] = $v;
            }
        }
        return response([
            'data' => $data,
            'meta' => $meta
        ]);
    }

    /**
     * @param mixed $message
     * @param int   $code
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    protected function no($message, int $code = 500) {
        if (is_string($message)) {
            return response([
                'error' => [
                    'code'    => $code,
                    'message' => $message,
                ]
            ]);
        } else {
            return response($message);
        }
    }

    /**
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    protected function bad_request() {
        return $this->no('bad request', 400);
    }

    protected function not_found(string $msg) {

        return $this->no('Not found' . $msg, 404);
    }
}