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

    /**
     * @property string previous
     * @property string next
     */
    class Links {
    }

    /**
     * @property int   total
     * @property int   count
     * @property int   per_page
     * @property int   current_page
     * @property int   total_pages
     * @property Links links
     */
    class Pagination {
    }

    /**
     * @property string     prev
     * @property Pagination pagination
     */
    class Meta {

    }

    class Service {

        /** @var string $authorization */
        const AUTHORIZE = '__AUTHORIZATION__';

        /** @var Error $error */
        private $error;
        /** @var Meta result */
        private $meta;
        /** @var mixed $items */
        private $items;
        /** @var array $passport */
        private $headers;
        /** @var mixed $body */
        private $body;
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
            $this->error   = null;
            $this->meta    = null;
            $this->items   = null;
            $this->body    = null;
            $this->builder = $builder;
            if ($builder) {
                // set basic headers
                $builder->withHeaders([
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
            $pattern = '/^https?:\/\/(www\.)?\w+\.[a-z]{2,6}(\/)?$/';
            if (preg_match($pattern, $uri)) {
                return $uri;
            }
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
         * Parse Response
         */
        private function parseResponse() {
            if ($this->body) {
                if (isset($this->body['error'])) {
                    $this->error          = new Error();
                    $this->error->code    = isset($this->body['error']['code']) ? $this->body['error']['code'] : 0;
                    $this->error->message = isset($this->body['error']['message']) ? $this->body['error']['message'] : 'Unknown';
                } else {
                    $this->parseItems();
                    $this->parseMeta();
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
        public function body() {
            return $this->body;
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
         * Parse Items
         */
        private function parseItems() {
            $this->items = isset($this->body['items']) ? $this->body['items'] : $this->body;
        }

        /**
         * @param string $cls
         * @return array|mixed|null
         */
        public function items(string $cls = '') {
            return $this->data($cls);
        }

        /**
         * @param string $cls
         * @return array|mixed|null
         */
        public function result(string $cls = '') {
            return $this->data($cls);
        }

        /**
         * @param string $cls
         * @return array|mixed|null
         */
        public function data(string $cls = '') {
            if ($cls && class_exists($cls) && is_array($this->items)) {
                if (isset($result[0])) {
                    $data = null;
                    foreach ($this->items as $v) {
                        if (is_array($v)) {
                            $obj = $this->getObject($v, $cls);
                            if ($obj) {
                                $data[] = $obj;
                            }
                        } else {
                            $data = $v;
                        }
                    }
                    return $data;
                } else {
                    return $this->getObject($this->items, $cls);
                }
            } else {
                return $this->items;
            }
        }

        /**
         * Parse Meta
         */
        private function parseMeta() {
            $meta             = new Meta();
            $meta->pagination = new Pagination();
            if (isset($this->body['meta']['pagination'])) {
                $page                              = $this->body['meta']['pagination'];
                $meta->pagination->total           = isset($page['total']) ? $page['total'] : 0;
                $meta->pagination->count           = isset($page['count']) ? $page['count'] : 0;
                $meta->pagination->per_page        = isset($page['per_page']) ? $page['per_page'] : 0;
                $meta->pagination->current_page    = isset($page['current_page']) ? $page['current_page'] : 0;
                $meta->pagination->total_pages     = isset($page['total_pages']) ? $page['total_pages'] : 0;
                $meta->pagination->links           = new Links();
                $meta->pagination->links->previous = isset($page['links']['previous']) ? $page['links']['previous'] : '';
                $meta->pagination->links->next     = isset($page['links']['next']) ? $page['links']['next'] : '';
            }
            $this->meta = $meta;
        }

        /**
         * @param string $uri
         * @return Service
         */
        public function get(string $uri) {
            $builder    = (new CurlService)->to($this->parseUri($uri));
            $builder    = $this->init($builder);
            $this->body = $builder->get();
            $this->parseResponse();
            return $this;
        }

        /**
         * @param string $uri
         * @return Service
         */
        public function delete(string $uri) {
            $builder    = (new CurlService)->to($this->parseUri($uri));
            $builder    = $this->init($builder);
            $this->body = $builder->delete();
            $this->parseResponse();
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
            $this->body = $builder->post();
            $this->parseResponse();
            return $this;
        }

        /**
         * @param string $cls
         * @return Error|array
         */
        public function response(string $cls = '') {
            if ($this->error) {
                $this->error->message = $this->error();
                return [
                    'error' => $this->error
                ];
            } else {
                $return['data'] = $this->data($cls);
                if ($this->meta) {
                    $return['meta'] = $this->meta;
                }
                return $return;
            }
        }
    }
}




