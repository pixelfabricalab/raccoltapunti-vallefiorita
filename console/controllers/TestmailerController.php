<?php 
namespace console\controllers;

use Yii;
use yii\console\Controller;

class TestmailerController extends Controller {
    public function actionSend() {
        Yii::$app->mailer
            ->compose('test')
            ->setFrom('ocr@pixelfabrica.it')
            ->setTo('acandry90@gmail.com')
            ->setSubject('Mail di prova inviata da ' . Yii::$app->name)
            ->send();
    }
}