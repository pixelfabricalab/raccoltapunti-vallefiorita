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

        return $this->render('/profilo/index_b2b', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

}