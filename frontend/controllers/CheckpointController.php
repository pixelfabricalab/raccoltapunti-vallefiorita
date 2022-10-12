<?php

namespace frontend\controllers;

class CheckpointController extends \yii\web\Controller
{
    public function actionIndex()
    {
        \Yii::$app->session->addFlash('success', 'Perfetto! Il tuo Checkpoint è stato registrato con successo!');
        return $this->render('index');
    }

}
