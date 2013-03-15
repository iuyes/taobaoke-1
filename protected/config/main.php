<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Web Application',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.modules.simple_rbac.models.*',
		'application.modules.simple_rbac.components.*',
		'application.modules.simple_rbac.models.forms.*',
		'application.modules.simple_rbac.models.db_tables.*',
		'application.modules.simple_rbac.models.data_providers.*',
		'application.modules.blog.models.*',
		'application.modules.blog.components.*',
		'application.modules.blog.models.TableModel.*',
		'application.modules.taobao.models.*',
		'application.modules.taobao.components.*',
		'application.modules.taobao.models.TableModel.*',

	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'admin',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		'simple_rbac' => array(
			'setup' =>false
		),
		'blog' =>array(
		
		),
		'taobao',
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		 */

		/*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		 */
		// uncomment the following to use a MySQL database
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=diy',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'root123',
			'charset' => 'utf8',
		),
		'authManager' => array(
			'class'           => 'CDbAuthManager',
			'connectionID'    => 'db',
			'itemTable'       => 'AuthItem',
			'itemChildTable'  => 'AuthItemChild',
			'assignmentTable' => 'AuthAssignment',
			'defaultRoles'    =>  array(
				'guest',
				'authenticated',
			),
		),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
		'appkey' => '21352824',
		'secretkey' => '6165ac00af5e9fe95150c04f3fd8629b',
		'pid' => '34483966',
		'nick' => '至又无言去不闻',
		//pid , nick 二选一
	),
);
