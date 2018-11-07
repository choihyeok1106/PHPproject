<?php

use Illuminate\Support\Facades\App;


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
        $path .= v();
    } else {
        $path = str_replace('.css', '.min.css', $path);
    }
    return $path;
}

/**
 * @param string $path
 * @return string
 */
function js($path) {
    if (isDev()) {
        $path .= v();
    } else {
        $path = str_replace('.js', '.min.js', $path);
    }
    return $path;
}

/**
 * @return bool
 */
function isDev() {
    return App::environment('dev');
}