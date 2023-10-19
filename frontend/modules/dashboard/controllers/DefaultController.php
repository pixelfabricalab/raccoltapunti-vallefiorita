<?php

namespace frontend\modules\dashboard\controllers;

use frontend\controllers\Controller;

/**
 * Default controller for the `dashboard` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCheckin()
    {
        \Yii::$app->session->setFlash('success', 'Check-in completato! Ti sono stati accreditati +10 punti.');
        return $this->redirect(['index']);
    }
}
