<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
	'defaultRoute' => 'login',
    'bootstrap' => ['log'],
    'modules' => [
	'gii' => [
      'class' => 'yii\gii\Module', //adding gii module
      'allowedIPs' => ['127.0.0.1', '::1']  //allowing ip's 
    ],
	
	
	],
    'components' => [
        'user' => [
            'identityClass' => 'backend\models\AdminUser',
			'loginUrl' => 'login\index',
            'enableAutoLogin' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
    ],
    'params' => $params,
];
