<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'opts' => [
            'class' => \common\helpers\OptionsListRetriever::class,
        ],
        'qr' => [
            'class' => \common\components\QRCode::class,
        ],
        'ocr' => [
            'class' => \common\components\Asprise::class,
        ],
        'scanner' => [
            'class' => \common\components\ScontrinoHelper::class,
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
            'class' => \yii\caching\FileCache::class,
        ],
        'authManager' => [
            'class' => \yii\rbac\DbManager::class,
        ],
        'mailer' => [
            'class' => \yii\swiftmailer\Mailer::class,
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
    'modules' => [
        'gridview' =>  [
            'class' => '\kartik\grid\Module',
            // your other grid module settings
        ],
        'gridviewKrajee' =>  [
            'class' => '\kartik\grid\Module',
            // your other grid module settings
        ],
    ],
];
