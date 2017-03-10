<?php
$host = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'].'/' : ltrim(DJY_WAP_URL,'http://');

define('BASE_URL', 'http://' . $host);
define('ALIYUN_OSS_HOST', 'aliyuncs.com');
define('BASE_CSS_URL', BASE_URL. '/assets/css');
define('BASE_JS_URL', BASE_URL. '/assets/js');