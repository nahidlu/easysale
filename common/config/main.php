<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
		'session' => [
            'class' => 'yii\web\DbSession'
        ],
		/* 'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=easysaledb',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
			'tablePrefix'=>'tbl_'
        ], */
		
		 /* 'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=easysale',
            'username' => 'easysale',
            'password' => 'easysale!#?',
            'charset' => 'utf8',
			'tablePrefix'=>'tbl_'
        ], */
        /* 'cache' => [
            'class' => 'yii\caching\FileCache',
        ], */
    ],
];
