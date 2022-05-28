<?php 
namespace console\controllers;

use Yii;
use yii\console\Controller;

class TestmailerController extends Controller {
    public function actionSend() {
        Yii::$app->mailer
            ->compose('test')
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo('acandry90@gmail.com')
            ->setSubject('Mail di prova inviata da ' . Yii::$app->name)
            ->send();
    }
}