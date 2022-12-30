<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'scanner' => [
            'class' => 'common\components\ScontrinoHelper',
        ],
        'punti' => [
            'class' => 'common\components\GestorePunti',
            'on accredito' => function($event) {
                \Yii::$app->mailer->compose()
                    ->setFrom('from@domain.com')
                    ->setTo('to@domain.com')
                    ->setSubject('Message subject')
                    ->setTextBody('Plain text content')
                    ->setHtmlBody($event->attivita)
                    ->send();
            }
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.mailtrap.io',
                'username' => 'b333154ad0b695',
                'password' => 'f5207996b0745f',
                'port' => '2525',
                'encryption' => 'tls',
            ],
        ],
    ],
];
