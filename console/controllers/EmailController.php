<?php 
namespace console\controllers;

use Yii;
use yii\console\Controller;

class EmailController extends Controller {
    public function actionTest() {
        Yii::$app->mailer
            ->compose('test')
            ->setFrom('amministrazione@pixelfabrica.it')
            ->setTo('vincentveri@yahoo.com')
            ->setSubject('[Profility] Messaggio dal server locale')
            ->send();
    }
}