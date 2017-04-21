<?php
date_default_timezone_set('PRC');
// change the following paths if necessary
$yii=dirname(__FILE__).'/../framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';

// Include composer autoloader
require_once(__DIR__.'/protected/vendor/autoload.php');

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);
require_once(dirname(__FILE__).'/protected/config/define.php');
require_once dirname(__FILE__).'/protected/extensions/log4php/Logger.php';
Logger::configure(__DIR__.'/protected/config/log4php.xml');
require_once($yii);
Yii::createWebApplication($config)->run();
