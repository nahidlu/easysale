<?php
return [
    'components' => [
		'urlManager' => [
	    	'class' => 'yii\web\UrlManager',
		    'enablePrettyUrl' => true,
		    'showScriptName' => false,
		    //'caseSensitive'=>false,
		    //'suffix' => '.html',
		    /* 'rules' => [
			    '' => 'site/index',
			    '<action>'=>'site/<action>',
		    ], */
	    ],
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=easysaledb',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
			'tablePrefix'=>'tbl_'
        ],
		
		/*  'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=easysale',
            'username' => 'easysale',
            'password' => 'easysale!#?',
            'charset' => 'utf8',
			'tablePrefix'=>'tbl_'
        ], */
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
        ],
    ],
];
