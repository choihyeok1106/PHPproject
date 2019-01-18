<?php
/**
 * Author: R.j
 * Date: 2019-01-15 16:40
 * File: Logger.php
 */

namespace App\Supports;


use Illuminate\Support\Facades\File;

/**
 * Usage :
 *      -> (new Logger)->setRoot($root)->setLog($log)->write();
 *      -> (new Logger(['root'=>$root,'log'=>$log]))->write();
 *      -> Logger::save($log,$root);
 */
class Logger {

    private $root;
    private $log;
    private $ip;
    private $port;
    private $url;
    private $method;
    private $name;
    private $timezone;

    /**
     * Logger constructor.
     * @param mixed $parameters
     */
    function __construct($parameters = null) {
        if (is_array($parameters)) {
            foreach ($parameters as $k => $v) {
                if (property_exists($this, $k)) {
                    $this->$k = $v;
                }
            }
        }
        if (!$this->ip) {
            $this->ip = $this->ip();
        }
        if (!$this->port) {
            $this->port = $this->port();
        }
        if (!$this->url) {
            $this->url = $this->url();
        }
        if (!$this->method) {
            $this->method = $this->method();
        }
        if (!$this->name) {
            $this->name = $this->name();
        }
        if ($this->timezone) {
            date_default_timezone_set($this->timezone);
        }
    }

    /**
     * @return string
     */
    private function ip() {
        if (getenv('HTTP_CLIENT_IP')) {
            $ip = getenv('HTTP_CLIENT_IP');
        } elseif (getenv('HTTP_X_FORWARDED_FOR')) {
            $ip = getenv('HTTP_X_FORWARDED_FOR');
        } elseif (getenv('REMOTE_ADDR')) {
            $ip = getenv('REMOTE_ADDR');
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

    /**
     * @return string
     */
    private function url() {
        $scheme = isset($_SERVER['REQUEST_SCHEME']) ? "{$_SERVER['REQUEST_SCHEME']}://" : '';
        if (isset($_SERVER['SERVER_NAME'])) {
            $server = $_SERVER['SERVER_NAME'];
        } elseif (isset($_SERVER['HTTP_HOST'])) {
            $server = $_SERVER['HTTP_HOST'];
        } else {
            $server = '';
        }
        $uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';
        return $scheme . $server . $uri;
    }

    /**
     * @return string
     */
    private function port() {
        return isset($_SERVER['SERVER_PORT']) ? $_SERVER['SERVER_PORT'] : '';
    }

    /**
     * @return string
     */
    private function method() {
        return isset($_SERVER['REQUEST_METHOD']) ? strtoupper($_SERVER['REQUEST_METHOD']) : '';
    }

    /**
     * @return string
     */
    private function name() {
        $suffix = '-' . date('Ymd') . '.log';
        if (isset($_SERVER['SERVER_NAME'])) {
            $name = $_SERVER['SERVER_NAME'] . $suffix;
        } elseif (isset($_SERVER['HTTP_HOST'])) {
            $name = $_SERVER['HTTP_HOST'] . $suffix;
        } else {
            $name = 'log' . $suffix;
        }
        return $name;
    }

    /**
     * @return string
     */
    private function client() {
        return "{$this->ip}:{$this->port}";
    }

    /**
     * @return string
     */
    private function file() {
        if (substr($this->root, -1) != '/') {
            $this->root .= '/';
        }
        return $this->root . $this->name;
    }

    /**
     * @param string $name
     * @return Logger
     */
    public function setName(string $name) {
        $this->name = $name;
        return $this;
    }

    /**
     * @param string $root
     *
     * @return Logger
     */
    public function setRoot(string $root) {
        $this->root = $root;
        return $this;
    }

    /**
     * @param string $log
     *
     * @return Logger
     */
    public function setLog(string $log) {
        $this->log = $log;
        return $this;
    }

    /**
     * @return bool|string
     */
    public function write() {
        $file = false;
        if ($this->log && $this->root) {
            if (!file_exists($this->root)) {
                File::makeDirectory($this->root);
            }
            if (file_exists($this->root) && is_dir($this->root)) {
                $client = $this->client();
                $date   = date('Y/m/d H:i:s');
                $method = strtoupper($this->method);
                $timezone = date_default_timezone_get();
                if (is_array($this->log)) {
                    $log = $this->outArray($this->log);
                } elseif (is_object($this->log)) {
                    $log = $this->outObject($this->log);
                } else {
                    $log = $this->log;
                }
                $log    = <<<EOT
< Client: {$client}
< {$method}: {$this->url}
< Date: {$date} {$timezone}
{$log}
\r\n
EOT;
                $file   = $this->file();
                $handle = fopen($file, 'a+');
                fwrite($handle, $log);
                fclose($handle);
            }
        }
        return $file;
    }

    private function outObject($obj) {
        return $this->outArray(json_decode(json_encode($obj), true));
    }

    private function outArray($array, $lvl = 0) {
        $sub    = $lvl + 1;
        $return = "";
        if ($lvl == null) {
            $return = "\tarray(\n";
        }
        foreach ($array as $key => $mixed) {
            $key = trim($key);
            if (!is_array($mixed)) {
                $mixed = trim($mixed);
            }
            if (empty($key) && empty($mixed)) {
                continue;
            }
            if (!is_numeric($key) && !empty($key)) {
                if ($key == "[]") {
                    $key = null;
                } else {
                    $key = "'" . addslashes($key) . "'";
                }
            }

            if ($mixed === null) {
                $mixed = 'null';
            } elseif ($mixed === false) {
                $mixed = 'false';
            } elseif ($mixed === true) {
                $mixed = 'true';
            } elseif ($mixed === "") {
                $mixed = "''";
            }
            if (is_array($mixed)) {
                if ($key !== null) {
                    $return .= "\t" . str_repeat("\t", $sub) . "$key => array(\n";
                    $return .= $this->outArray($mixed, $sub);
                    $return .= "\t" . str_repeat("\t", $sub) . "),\n";
                } else {
                    $return .= "\t" . str_repeat("\t", $sub) . "array(\n";
                    $return .= $this->outArray($mixed, $sub);
                    $return .= "\t" . str_repeat("\t", $sub) . "),\n";
                }
            } else {
                if ($key !== null) {
                    $return .= "\t" . str_repeat("\t", $sub) . "$key => $mixed,\n";
                } else {
                    $return .= "\t" . str_repeat("\t", $sub) . $mixed . ",\n";
                }
            }
        }
        if ($lvl == null) {
            $return .= "\t);\n";
        }
        return $return;
    }

    /**
     * @param mixed $parameters
     * @return Logger
     */
    public static function new($parameters = null) {
        return new Logger($parameters);
    }

    /**
     * @param mixed  $log
     * @param string $root
     * @param null   $parameters
     * @return bool|string
     */
    public static function save($log, string $root, $parameters = null) {
        $parameters['log']  = $log;
        $parameters['root'] = $root;
        return Logger::new($parameters)->write();
    }

}