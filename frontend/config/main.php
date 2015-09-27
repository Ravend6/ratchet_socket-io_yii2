<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    // 'modules' => [
    //     'api-v1' => [
    //         'class' => 'frontend\modules\api\v1\Module',
    //     ],
    // ],
    'components' => [
        // 'request' => [
        //     'parsers' => [
        //         'application/json' => 'yii\web\JsonParser',
        //     ]
        // ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enableStrictParsing' => true,
            // Disable index.php
            'showScriptName' => false,
            // Disable r= routes
            'enablePrettyUrl' => true,
            'rules' => [
                '<action:(login|logout|signup)>' => 'site/<action>',
                '/' => 'site/index',
                // 'api/v1/statuses' => 'api-v1/status',
                // '<controller:\w+>/<id:\d+>' => '<controller>/view',
                // '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                // 'review' => 'site/review',
                // 'accessories' => 'site/accessories',
                // '<slug_ru>' => 'site/slug',
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => 'api/v1/status', 
                    // 'except' => ['update'],
                ],
            ],
        ],
        // 'request' => [
        //     'parsers' => [
        //         'application/json' => 'yii\web\JsonParser',
        //     ]
        // ],

        'user' => [
            'identityClass' => 'common\models\User',
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
