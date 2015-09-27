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
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'request' => [
           'csrfParam' => '_backendCSRF',
           'csrfCookie' => [
               'httpOnly' => true,
               'path' => '/admin',
           ],
       ],
       'session' => [
           'name' => 'BACKENDSESSID',
           'cookieParams' => [
               'path' => '/admin',
           ],
       ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => [
                'name' => '_backendIdentity',
                'path' => '/admin',
                'httpOnly' => true,
            ],
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
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            // Disable index.php
            'showScriptName' => false,
            'enableStrictParsing' => true,
            // Disable r= routes
            'enablePrettyUrl' => true,
            'rules' => [
                '<action:(login|logout|signup)>' => 'site/<action>',
              
                // '<controller:\w+>/<id:\d+>' => '<controller>/view',
                // '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                // '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                // 'review' => 'site/review',
                // 'accessories' => 'site/accessories',
                // '<slug_ru>' => 'site/slug',
            ],
        ],
    ],
    'params' => $params,
];
