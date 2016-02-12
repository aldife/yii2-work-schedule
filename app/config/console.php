<?php

Yii::setAlias('@tests', dirname(__DIR__) . '/tests');

$params = require(__DIR__ . '/params.php');
$db = require(__DIR__ . '/db.php');

return [
    'id' => 'basic-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log', 'gii'],
    'controllerNamespace' => 'app\commands',
    'modules' => [
        'gii' => 'yii\gii\Module',
    ],
    'controllerMap' => [
            'mongodb-migrate' => 'yii\mongodb\console\controllers\MigrateController'
    ],
    'components' => [
        
        'mailer' => [
           'class' => 'yii\swiftmailer\Mailer',
           'useFileTransport' => YII_DEBUG ? true : false,
            'messageConfig' => [
               'from' => [$params['adminEmail'] => $params['adminEmailName']], // this is needed for sending emails
               'charset' => 'UTF-8',
           ]
           // 'transport' => [
           //      'class' => 'Swift_SmtpTransport',
           //      'host' => 'smtp.gmail.com',
           //      'username' => 'aldiferdiyan',
           //      'password' => 'bimasakti@123',
           //      'port' => '465',
           //      'encryption' => 'ssl', 
           //  ],
           
        ],
        
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
    ],
    'params' => $params,
];
