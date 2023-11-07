<?php

namespace backend\controllers;

use backend\controllers\ProfiloController;
use common\models\User;
use common\models\Profilo;
use common\models\ProfiloSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


class BusinessController extends ProfiloController
{
    /**
     * Lists all Profilo models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProfiloSearch();
        $searchModel->business = true;
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Profilo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($b2b = null)
    {
        return $this->redirect(['/profilo/create', 'b2b' => 2]);
    }

}