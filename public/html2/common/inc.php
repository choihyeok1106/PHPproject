<?php
define('STATIC_SERVER', 'http://dev-static.puremeka.com');

function v($prefix = '?') {
    return "{$prefix}v=" . time();
}