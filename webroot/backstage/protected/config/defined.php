<?php
$host = $_SERVER['HTTP_HOST'].'/';
define(BASE_URL, 'http://'. $host);
define('BASE_CSS_URL', BASE_URL. 'assets/css');
define('BASE_JS_URL', BASE_URL. 'assets/js');
define('BASE_IMG_URL', BASE_URL. 'assets/images');