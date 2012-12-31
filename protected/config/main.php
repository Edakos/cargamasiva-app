<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.

Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');
 
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Carga Masiva',
	'language' => 'es',
	'sourceLanguage'=>'en',
    
    'theme'=>'rhea',
    
	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.components.MyActiveRecord',
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'ed',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
            'generatorPaths'=>array(
                'bootstrap.gii',
            ),
		),
        'auth' => array(
            'strictMode' => true, // when enabled authorization items cannot be assigned children of the same type.
            'users' => array('admin'), // a list of users who has access to the module.
            'userClass' => 'Usuario', // the name of the user model class.
            'userIdColumn' => 'id', // the name of the user id column.
            'userNameColumn' => 'username', // the name of the user name column.
            //'appLayout' => 'application.views.layouts.main', // the layout used by the module.
            'appLayout' => 'webroot.themes.bootstrap.views.layouts.main', // the layout used by the module.
            'viewDir' => null, // the path to view files to use with this module.
        ),		
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
        
        'authManager'=>array(
            'class'=>'CDbAuthManager',
            'connectionID'=>'db',
            'itemTable'=>'auth_item',
            'itemChildTable'=>'auth_item_child',
            'assignmentTable'=>'auth_assignment',
            'behaviors' => array(
                'auth.components.AuthBehavior',
            ),
        ),	
        	
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName' => false,
            //'urlSuffix'=>'.jsp',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		
        
		'db'=>array(
			'tablePrefix'=>'',
			'connectionString' => 'pgsql:host=localhost;port=5432;dbname=cm',
			'username'=>'postgres',
			'password'=>'postgres',
			'charset'=>'UTF8',
		),

        
        'coreMessage'=> array(
            'basePath' =>'protected/messages',
        
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
        'bootstrap'=>array(
            'class'=>'bootstrap.components.Bootstrap',
        ),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'sniese@senescyt.gob.ec',
	),
);
