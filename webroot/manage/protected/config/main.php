<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Web Application',
	'defaultController' => 'home',
	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.extensions.*',
		'application.extensions.log4php.*'
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'Backstage'
		/*'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'Enter Your Password Here',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),*/
		
	),

	// application components
	'components'=>array(

		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			'loginUrl' => ['login'],
			'class'=>'WebUser',
		),

		// uncomment the following to enable URLs in path-format
		
		/*'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			)
		),*/
		
		'smarty' => [
			'class' => 'SmartyViewRenderer',
		],
		// database settings are configured in database.php
		'db'=>require(dirname(__FILE__).'/database.php'),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>YII_DEBUG ? null : 'site/error',
		),
		'cache' => [
			'class' => 'system.caching.CFileCache',
			'hashKey' => false,
			'keyPrefix' => 'cache_',
		],

		'cacheDb' => [
			'class' => 'system.caching.CDbCache',
			'hashKey' => false,
			'keyPrefix' => 'cache_',
		],

		'log' => [
			'class' => 'CLogRouter',
			'routes' => [
				[
					'class' => 'CFileLogRoute',
					'levels' => 'trace, log, error, warning',
                    'categories' => 'system.*',
                    'logFile' => 'db.log',
				],
				[
					'class' => 'WapExceptionLogRoute',
					'levels' => 'error, warning',
                    'categories' => 'exception.*',
				],
				[
					'class' => 'FileLogRoute',
					'levels' => 'profile',
					'categories' => 'general.*',  
					'logFile' =>  date('Y-m-d').'.log',
				],
			],
		],
		'logger' => [
			'class' => 'WapLogger',
		],

	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=> require(__DIR__.'/params.php'),
);
