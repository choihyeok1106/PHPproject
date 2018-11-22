<?php

use Illuminate\Support\Facades\App;


/**
 * @param mixed  $expression
 * @param string $subject
 */
function pr($expression, $subject = '') {
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
function pe($expression, $subject = '') {
    pr($expression, $subject);
    exit;
}

/**
 * @param string $prefix
 * @return string
 */
function v($prefix = '?') {
    return "{$prefix}v=" . time();
}

/**
 * @param string $path
 * @return string
 */
function css($path) {
    if (isDev()) {
//        $path = str_replace('/css/', '/css.dev/', $path) . v();
        $path.=  v();
    } else {
        $path = str_replace('.css', '.min.css?v=' . env('APP_VERSION', 1), $path);
    }
    return $path;
}

/**
 * @param string $path
 * @return string
 */
function js($path) {
    if (isDev()) {
//        $path = str_replace('/js/', '/js.dev/', $path) . v();
        $path.=  v();
    } else {
        $path = str_replace('.js', '.min.js' . env('APP_VERSION', 1), $path);
    }
    return $path;
}

/**
 * @return bool
 */
function isDev() {
    return App::environment('dev');
}

/**
 * @return bool
 */
function isLocal() {
    return strtolower(env('APP_ENV')) == 'local';
}