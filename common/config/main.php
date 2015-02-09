<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
		'session' => [
            'class' => 'yii\web\DbSession'
        ],
		/* 'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=arrowsoft_software',
            'username' => 'root',
            'password' => '',
            'enableSchemaCache' => true,
			
            // Duration of schema cache.
            // 'schemaCacheDuration' => 3600,

            // Name of the cache component used. Default is 'cache'.
            //'schemaCache' => 'cache',
        ], */
		'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=arrowapp',
            'username' => 'arrowapp',
            'password' => 'U_q;*XZ4?1u~',
            'enableSchemaCache' => true,
			
            // Duration of schema cache.
            //'schemaCacheDuration' => 3600,

            // Name of the cache component used. Default is 'cache'.
            //'schemaCache' => 'cache',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];
