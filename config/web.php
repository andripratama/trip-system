<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
	  'modules'=>[
	  	'user' => [
	  		'class' => 'dektrium\user\Module',
	  	],
	  	'trip' => [
              'class' => 'app\modules\trip\Module',
          ],
      'redactor' => 'yii\redactor\RedactorModule',
	  ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'lkJx8kbZOOgM4owoQEM-ca4jISrDOYp2',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'identityClass' => 'dektrium\user\models\User',
        ],
        'authClientCollection'=>[
          'class'   => \yii\authclient\Collection::className(),
          'clients' => [
            // here is the list of clients you want to use
            // you can read more in the "Available clients" section
            'facebook' => [
              'class'        => 'dektrium\user\clients\Facebook',
              'clientId'     => '858833034203200',
              'clientSecret' => 'bbef0d20b887fbe722d288917ac39474',
            ],
          ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
        'db' => require(__DIR__ . '/db.php'),
        'urlManager'=>[
          'class'=>'yii\web\UrlManager',
          'enablePrettyUrl'=>true,
          'showScriptName'=>false,
          'rules'=>[
                //Navbar Menu
                '/'=>'site/index',
                '/create-event'=>'trip/event/create',
                '/event/<id:\d+>'=>'trip/event/view',
                '/all-event'=>'trip/event/index',

                //Login Sub Menu
                '/account'=>'user/settings/account',
                '/profile'=>'user/settings/profile',
                '/my-event'=>'trip/event/manage',
                '/logout'=>'user/logout',

                //others
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
           ],

        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
