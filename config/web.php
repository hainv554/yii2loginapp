<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'nguyen-van-hai',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
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
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
        'modules' => [
          'redactor' => 'yii\redactor\RedactorModule',
          'class' => 'yii\redactor\RedactorModule',
          'uploadDir' => '@webroot/uploads',
          'uploadUrl' => '/yii2basic/uploads',
          'user' => [
                'class' => 'dektrium\user\Module',
                'enableUnconfirmedLogin' => TRUE,
                'confirmWithin' => 21600,
                'cost' => 12,
                'admins' => ['admin']
              ],              
        ],
        
        'authClientCollection' => [
              'class' => 'yii\authclient\Collection',
              'clients' => [
                  'google' => [
                      'class'        => 'dektrium\user\clients\Google',
                      'clientId'     => '308974705386-qjcs57j6o78ft0nalq7k3he2emvmg20a.apps.googleusercontent.com',
                      'clientSecret' => 'cUUNx0nIyoyugRZKiD-J0pez',
                  ],
                    'facebook' => [
                              'class' => 'yii\authclient\clients\Facebook',
                              'authUrl' => 'https://www.facebook.com/dialog/oauth?display=popup',
                              'clientId' => '925029604292665',
                              'clientSecret' => '279a91618bb036a31f967b841751e344',
                    ],
                
                ],
        ],
        'mailer' => [
                'class' => 'yii\swiftmailer\Mailer',
                'viewPath' => '@app/mailer',
                'useFileTransport' => false,
                'transport' => [
                    'class' => 'Swift_SmtpTransport',
                    'host' => 'mailtrap.io',
                    'username' => '927aa49fdbeeb0',
                    'password' => 'f8a72b6a5ffbcf',
                    'port' => '2525',
                    'encryption' => 'tls',
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
