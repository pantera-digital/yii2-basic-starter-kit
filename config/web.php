<?php

use dektrium\user\models\User;

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log', 'media'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'userBalance' => [
            'class' => \pantera\user\balance\Component::className(),
            'userModel' => User::className(),
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'CgGKj9vZexX4qcWNI_YRnR_NFHk1TlEy',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
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
        'db' => $db,
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
        'i18n' => [
            'translations' => [
                'yii2mod.comments' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@yii2mod/comments/messages',
                ],
            ],
        ],
    ],
    'modules' => [
        'user' => [
            'class' => 'dektrium\user\Module',
        ],
        'user-balance' => [
            'class' => \pantera\user\balance\Module::class,
        ],
        'reserves' => [
            'class' => 'webmayak\reserves\Module',
            'accessRoles' => ['@']
        ],
        'seo' => [
            'class' => 'pantera\seo\Module',
        ],
        'rules' => [
            'class' => 'pantera\rules\admin\Module',
            'permissions' => ['@'],
        ],
        'discussion' => [
            'class' => 'pantera\discussions\Module',
            'access' => ['@'],
        ],
        'comment' => [
            'class' => 'yii2mod\comments\Module',
        ],
        'faq' => [
            'class' => \pantera\faq\admin\Module::className(),
            'access' => ['@'],
        ],
        'media' => [
            'class' => \pantera\media\Module::className(),
            'permissions' => ['@'],
        ],
        'content' => [
            'class' => \pantera\content\admin\Module::className(),
            'permissions' => ['@'],
        ],
        'mail' => [
            'class' => \pantera\mail\Module::class,
            'permissions' => ['@'],
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
