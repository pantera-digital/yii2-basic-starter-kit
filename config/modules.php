<?php

return [
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
];
