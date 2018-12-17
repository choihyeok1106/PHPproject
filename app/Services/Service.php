<?php
/**
 * Created by PhpStorm.
 * User: hyeokchoi
 * Date: 2018. 8. 16.
 * Time: PM 3:11
 */

namespace App\Services {

    use Ixudra\Curl\Builder;
    use Ixudra\Curl\CurlService;

    /**
     * @property int          code
     * @property array|string message
     */
    class Error {
    }

    class Service {

        /** @var string $authorization */
        const AUTHORIZE = '__AUTHORIZATION__';

        /** @var Error $error */
        private $error;
        /** @var mixed result */
        private $result;
        /** @var array $passport */
        private $headers = [];
        /** @var mixed $response */
        private $response;
        /** @var Builder $builder */
        private $builder;
        /** @var bool $asJsonResponse */
        private $asJsonResponse = true;

        /**
         * @param mixed $headers
         * @return Service
         */
        public static function make($headers = []) {
            return new Service($headers);
        }

        /**
         * Service constructor.
         * @param mixed $headers
         */
        function __construct($headers = []) {
            $this->authorize();
            $this->headers($headers);
        }

        /**
         * @param Builder $builder
         * @return Builder
         */
        private function init(Builder $builder) {
            $this->error    = null;
            $this->result   = null;
            $this->response = null;
            $this->builder  = $builder;
            if ($builder) {
                // set basic headers
                $builder->withHeaders([
                    //                    'Content-Type: application/json',
                    'Accept: application/json',
                    'Authorization: ' . $this->getAuthorize(),
                ]);
                if (is_array($this->headers)) {
                    foreach ($this->headers as $header) {
                        $builder->withHeader($header);
                    }
                }
                // set json request & json response
                $builder->asJsonRequest();
                if ($this->asJsonResponse) {
                    $builder->asJsonResponse(true);
                }
                // save log to local
                $log = env('API_LOG');
                if ($log) {
                    if (substr($log, -1) != '/') {
                        $log .= '/';
                    }
                    if (file_exists($log)) {
                        $log .= 'api-' . date('Ym') . '.txt';
                        $builder->enableDebug($log);
                    }
                }
            }
            return $builder;
        }

        /**
         * @return string
         */
        private function getAuthorize() {
            return isset($_SESSION[self::AUTHORIZE]) ? $_SESSION[self::AUTHORIZE] : '';
        }

        /**
         * set authorize
         */
        private function authorize() {
            if (!isset($_SESSION[self::AUTHORIZE])) {
                $id        = env('API_USERNAME');
                $pwd       = env('API_PASSWORD');
                $authorize = 'Basic ' . base64_encode("{{$id}}:{{$pwd}}");

                $_SESSION[self::AUTHORIZE] = $authorize;
            }
        }

        /**
         * @param string $uri
         * @return string
         */
        private function parseUri(string $uri) {
            $server = env('API_SERVER');
            if (substr($server, -1) !== '/') {
                $server .= '/';
            }
            if (substr($uri, 0, 1) === '/') {
                $uri = substr($uri, 1);
            }
            return $server . $uri;
        }

        /**
         * @param array  $arr
         * @param string $cls
         * @return null
         */
        private function getObject(array $arr, string $cls) {
            $obj = new $cls();
            if (method_exists($obj, 'make')) {
                $obj->make($arr);
                return $obj;
            }
            return null;
        }

        /**
         * @param mixed $json
         */
        private function parseResponse($json) {
            $this->response = $json;
            if ($json) {
                if (isset($json['error'])) {
                    $this->error          = new Error();
                    $this->error->code    = isset($json['error']['code']) ? $json['error']['code'] : 0;
                    $this->error->message = isset($json['error']['message']) ? $json['error']['message'] : 'Unknown';
                } else {
                    $this->result = $json;
                }
            }
        }

        /**
         * @return bool
         */
        public function succeed() {
            return !$this->error || $this->error->code == 200;
        }

        /**
         * @return string
         */
        public function error() {
            if ($this->error) {
                if (is_array($this->error->message)) {
                    foreach ($this->error->message as $k => $messages) {
                        foreach ($messages as $message) {
                            return $message;
                        }
                    }
                }
                return $this->error->message;
            }
            return '';
        }

        /**
         * @return mixed
         */
        public function response() {
            return $this->response;
        }

        /**
         * @return Service
         */
        public function htmlResponse() {
            $this->asJsonResponse = false;
            return $this;
        }

        /**
         * @return Builder
         */
        public function builder() {
            return $this->builder;
        }

        /**
         * @param string $key
         * @param mixed  $val
         * @return Service
         */
        public function header(string $key, $val) {
            if (is_string($key) && $key) {
                $this->headers[] = "{$key}: {$val}";
            }
            return $this;
        }

        /**
         * @param array $headers
         * @return Service
         */
        public function headers($headers) {
            if (is_array($headers)) {
                foreach ($headers as $key => $val) {
                    $this->header($key, $val);
                }
            }
            return $this;
        }

        /**
         * @param string $cls
         * @return mixed
         */
        public function result(string $cls = '') {
            if ($cls && class_exists($cls) && is_array($this->result)) {
                if (isset($this->result[0])) {
                    $result = null;
                    foreach ($this->result as $v) {
                        if (is_array($v)) {
                            $obj = $this->getObject($v, $cls);
                            if ($obj) {
                                $result[] = $obj;
                            }
                        } else {
                            $result = $v;
                        }
                    }
                    return $result;
                } else {
                    return $this->getObject($this->result, $cls);
                }
            } else {
                return $this->result;
            }
        }

        /**
         * @param string $uri
         * @return Service
         */
        public function get(string $uri) {
            $builder = (new CurlService)->to($this->parseUri($uri));
            $builder = $this->init($builder);
            $this->parseResponse($builder->get());
            return $this;
        }

        /**
         * @param string $uri
         * @return Service
         */
        public function delete(string $uri) {
            $builder = (new CurlService)->to($this->parseUri($uri));
            $builder = $this->init($builder);
            $this->parseResponse($builder->delete());
            return $this;
        }

        /**
         * @param string $uri
         * @param array  $data
         * @return Service
         */
        public function post(string $uri, $data = null) {
            $builder = (new CurlService)->to($this->parseUri($uri));
            $builder = $this->init($builder);
            if ($data) {
                $builder->withData($data);
            }
            $this->parseResponse($builder->post());
            return $this;
        }
    }
}




