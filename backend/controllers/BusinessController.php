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
    public function actionCreate()
    {
        $model = new Profilo();
        $model->b2b = Profilo::B2B_ATTIVO;

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $this->process($model)) {
                $this->addOk();
                return $this->redirect(['update', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

}