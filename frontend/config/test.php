<?php
return [
    'id' => 'app-frontend-tests',
    'components' => [
        'assetManager' => [
            'basePath' => __DIR__ . '/../web/assets',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                // TODO выяснить, есть ли нужда в rules
                '' => 'site/index',
                '<action>'=>'site/<action>',
                '<controller:\w+>/<action:\w+>/' => '<controller>/<action>',
            ],
        ],
        'request' => [
            'cookieValidationKey' => 'test',
        ],
    ],
];
