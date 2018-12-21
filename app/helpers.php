<?php

use Illuminate\Support\Facades\App;


/**
 * @param mixed  $expression
 * @param string $subject
 */
function pr($expression, string $subject = '') {
    echo '<fieldset style="margin-bottom: .5em">';
    if (gettype($subject) === 'string' && trim($subject)) {
        echo "<legend>{$subject}</legend>";
    }
    echo "<pre style='margin: 0'>";
    print_r($expression);
    echo '</pre></fieldset>';
}

/**
 * @param mixed  $expression
 * @param string $subject
 */
function pe($expression, string $subject = '') {
    pr($expression, $subject);
    exit;
}

/**
 * @param string $prefix
 * @return string
 */
function v(string $prefix = '?') {
    return "{$prefix}v=" . time();
}

/**
 * @param string $path
 * @return string
 */
function css(string $path) {
    if (isdev()) {
        //        $path = str_replace('/css/', '/css.dev/', $path) . v();
        $path .= v();
    } else {
        $path = str_replace('.css', '.min.css?v=' . env('APP_VERSION', 1), $path);
    }
    return $path;
}

/**
 * @param string $path
 * @return string
 */
function js(string $path) {
    if (isdev()) {
        //        $path = str_replace('/js/', '/js.dev/', $path) . v();
        $path .= v();
    } else {
        $path = str_replace('.js', '.min.js?v=' . env('APP_VERSION', 1), $path);
    }
    return $path;
}

/**
 * @return bool
 */
function isdev() {
    return App::environment('dev');
}

/**
 * @return bool
 */
function islocal() {
    return strtolower(env('APP_ENV')) == 'local';
}

/**
 * @param mixed $obj
 * @return bool
 */
function islist($obj) {
    return is_array($obj) && isset($obj[0]);
}

/**
 * @param string $name
 * @param mixed  $val
 * @param int    $minutes
 * @param string $domain
 */
function cookieset(string $name, $val, int $minutes, $domain = '/') {
    setcookie($name, $val, time() + $minutes * 60, $domain);
}

/**
 * @param string $name
 * @param null   $deft
 */
function cookieget(string $name, $deft = null) {
    isset($_COOKIE[$name]) ? $_COOKIE[$name] : $deft;
}

/**
 * @param string $name
 */
function cookiedel(string $name) {
    setcookie($name, null, 0, '/');
}

/**
 * @param  string $str
 * @param int     $chars
 * @param string  $tail
 * @return string
 */
function cutstr(string $str, int $chars = 32, string $tail = '...') {
    if (mb_strlen($str) > $chars) {
        $str = mb_substr($str, 0, $chars) . $tail;
    }

    return $str;
}

/**
 * @param array $dirs
 */
function include_routes(array $dirs) {
    foreach ($dirs as $dir) {
        $path = base_path('routes' . DIRECTORY_SEPARATOR . $dir);
        if (file_exists($path) && is_dir($path)) {
            $files = scandir(base_path('routes' . DIRECTORY_SEPARATOR . $dir));
            foreach ($files as $file) {
                if (substr($file, -4) == '.php') {
                    $filename = $path . DIRECTORY_SEPARATOR . $file;
                    if (!in_array($filename, get_included_files())) {
                        include $filename;
                    }
                }
            }
        }
    }
}