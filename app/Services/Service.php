<?php
/**
 * Created by PhpStorm.
 * User: hyeokchoi
 * Date: 2018. 8. 16.
 * Time: PM 3:11
 */

namespace App\Services {

    use App\Cache\Cache;
    use App\Supports\UserPrefs;
    use Illuminate\Support\Facades\App;
    use Ixudra\Curl\Builder;
    use Ixudra\Curl\CurlService;
    use Ixudra\Curl\Facades\Curl;

    /**
     * @property int code
     * @property array|string message
     */
    class Error
    {
    }

    class Service
    {

        /** @var string $authorization */
        const AUTHORIZE = '__AUTH__';

        /** @var Error $error */
        private $error;
        /** @var mixed $items */
        private $items;
        /** @var array $passport */
        private $headers;
        /** @var mixed $body */
        private $body;
        /** @var mixed $meta */
        private $meta;
        /** @var Builder $builder */
        private $builder;
        /** @var bool $asJsonResponse */
        private $asJsonResponse = true;
        /** @var bool $debug */
        private $debug = false;

        /**
         * @param mixed $headers
         * @return Service
         */
        public static function make($headers = [])
        {
            return new Service($headers);
        }

        /**
         * Service constructor.
         * @param mixed $headers
         */
        function __construct($headers = [])
        {
            $this->authorize();
            $this->headers($headers);
        }

        /**
         * @param Builder $builder
         * @return Builder
         */
        private function init(Builder $builder)
        {
            $this->error = null;
            $this->meta = null;
            $this->items = null;
            $this->body = null;
            $this->builder = $builder;
            if ($builder) {
                // set basic headers
                $builder->withHeaders([
                    'Accept: application/json',
                    'Authorization: ' . $this->getAuthorize(),
                    'X-App-Locale: ' . App::getLocale()
                ]);
                if (UserPrefs::passport()) {
                    $this->headers(UserPrefs::pass());
                }
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
        private function getAuthorize()
        {
            return isset($_SESSION[self::AUTHORIZE]) ? $_SESSION[self::AUTHORIZE] : '';
        }

        /**
         * set authorize
         */
        private function authorize()
        {
            if (!isset($_SESSION[self::AUTHORIZE])) {
                $id = env('API_USERNAME');
                $pwd = env('API_PASSWORD');
                $authorize = 'Basic ' . base64_encode("{{$id}}:{{$pwd}}");

                $_SESSION[self::AUTHORIZE] = $authorize;
            }
        }

        /**
         * @param string $uri
         * @return string
         */
        private function parseUri(string $uri)
        {
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
         * Parse Response
         */
        private function parseResponse()
        {
            if ($this->body) {
                if (isset($this->body['error'])) {
                    $this->error = new Error();
                    $this->error->code = isset($this->body['error']['code']) ? $this->body['error']['code'] : 0;
                    $this->error->message = isset($this->body['error']['message']) ? $this->body['error']['message'] : 'Unknown';
                } else {
                    $this->parseItems();
                    $this->parseMeta();
                }
            }
            if ($this->debug) {
                echo '<pre>';
                print_r($this);
                echo '</pre>';
                exit;
            }
        }

        /**
         * @return bool
         */
        public function succeed()
        {
            return !$this->error || $this->error->code == 200;
        }

        /**
         * @return string
         */
        public function error()
        {
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
         * @param bool $debug
         * @return Service
         */
        public function debug(bool $debug)
        {
            $this->debug = $debug;
            return $this;
        }

        /**
         * @return mixed
         */
        public function body()
        {
            return $this->body;
        }

        /**
         * @return Service
         */
        public function htmlResponse()
        {
            $this->asJsonResponse = false;
            return $this;
        }

        /**
         * @return Builder
         */
        public function builder()
        {
            return $this->builder;
        }

        /**
         * @param string $key
         * @param mixed $val
         * @return Service
         */
        public function header(string $key, $val)
        {
            if (is_string($key) && $key) {
                $this->headers[] = "{$key}: {$val}";
            }
            return $this;
        }

        /**
         * @param array $headers
         * @return Service
         */
        public function headers($headers)
        {
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
        private function parseItems()
        {
            $this->items = isset($this->body['items']) ? $this->body['items'] : $this->body;
        }

        /**
         * @return array|mixed|null
         */
        public function items()
        {
            return $this->data();
        }

        /**
         * @return array|mixed|null
         */
        public function result()
        {
            return $this->data();
        }

        /**
         * @return array|mixed|null
         */
        public function data()
        {
            return $this->items;
        }

        /**
         * Parse Meta
         */
        private function parseMeta()
        {
            if (isset($this->body['meta'])) {
                $this->meta = $this->body['meta'];
            }
        }

        /**
         * @param string $uri
         * @param null $data
         * @return Service
         */
        public function get(string $uri, $data = null)
        {
            $builder = (new CurlService)->to($this->parseUri($uri));
            $builder = $this->init($builder);
            if (is_array($data) && $data) {
                $builder->withData($data);
            }
            $this->body = $builder->get();
            $this->parseResponse();
            return $this;
        }

        /**
         * @param string $uri
         * @return Service
         */
        public function delete(string $uri)
        {
            $builder = (new CurlService)->to($this->parseUri($uri));
            $builder = $this->init($builder);
            $this->body = $builder->delete();
            $this->parseResponse();
            return $this;
        }

        /**
         * @param string $uri
         * @param array $data
         * @return Service
         */
        public function post(string $uri, $data = null)
        {
            $builder = (new CurlService)->to($this->parseUri($uri));
            $builder = $this->init($builder);
            if (is_array($data) && $data) {
                $builder->withData($data);
            }
            $this->body = $builder->post();
            $this->parseResponse();
            return $this;
        }

        /**
         * @return Error|array
         */
        public function response()
        {
            if ($this->error) {
                $this->error->message = $this->error();
                return [
                    'error' => $this->error
                ];
            } else {
                $return['data'] = $this->data();
                if ($this->meta) {
                    $return['meta'] = $this->meta;
                }
                return $return;
            }
        }
    }
}




