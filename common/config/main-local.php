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
            'dsn' => 'mysql:host=localhost;dbname=easysale',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
			'tablePrefix' => 'tbl_'
        ],
		/* 'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=arrowapp',
            'username' => 'arrowapp',
            'password' => 'U_q;*XZ4?1u~',
            'charset' => 'utf8',
			'tablePrefix' => 'tbl_'
        ], */
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
    ],
];
