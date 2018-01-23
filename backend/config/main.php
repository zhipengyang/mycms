<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
//    'defaultRoute' => 'site/default',
//    'catchAll' => 'site/default',

    'modules' => [
        'third' => [
            'class' => 'backend\modules\third\Module'
        ],
        'verify' => [
            'class' => 'backend\modules\verify\Module'
        ],
        'admin' => [
            'class' => 'mdm\admin\Module',
            'layout' => 'left-menu',
        ],
        'user' => [
            'class' => 'dektrium\user\Module',
            'modelMap' => [
                'RegistrationForm' => 'backend\models\RegistrationForm'
            ]
        ],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => false,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=10.8.31.34;dbname=crms',
            'username' => 'root',
            'password' => 'root',
            'charset' => 'utf8',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager', // 或者使用  'yii\rbac\DbManager'
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.126.com',
                'username' => 'zhipeng0520@126.com',
                'password' => '556677aaa',
                'port' => '25',
                'encryption' => 'tls',
            ]
        ],
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@dektrium/user/views' => '@backend/views/user'
                ]
            ]
        ],
        'urlManager' => [
//            'enablePrettyUrl' => true,
//            'showScriptName' => false,
            'rules' => [
                'register' =>'user/registration/register',
//                '<controller>s' => '<controller>/index',
//                '<controller>/<id:\d+>' => '<controller>/view'
            ],
        ],
    ],
    'params' => $params,
];
