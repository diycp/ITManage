<?php
$host = $_SERVER['HTTP_HOST'].'/';
define('BASE_URL', 'http://'. $host);
define('BASE_CSS_URL', BASE_URL. 'assets/css');
define('BASE_JS_URL', BASE_URL. 'assets/js');
define('BASE_IMG_URL', BASE_URL. 'assets/images');
define('BASE_PLUGIN_URL', BASE_URL. 'assets/plugins');

define('PHP_BIN', '/usr/local/php7/bin/php');