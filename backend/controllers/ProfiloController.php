<?php

namespace backend\controllers;

use common\models\User;
use common\models\Profilo;
use common\models\ProfiloSearch;
use backend\controllers\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProfiloController implements the CRUD actions for Profilo model.
 */
class ProfiloController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::class,
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Profilo models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProfiloSearch();
        $searchModel->b2b = Profilo::B2B_NO;
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
        $model = new Profilo();
        if ($b2b) {
            $model->b2b = $b2b;
        }

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['/profilo/update', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('/profilo/create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Profilo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->b2b == $model::B2B_SI) {
            $this->addWarning('Scheda B2B da Validare.');
        }
        if ($model->b2b == $model::B2B_ATTIVO && !$model->valore_sconto) {
            $this->addWarning('Scheda B2B Attiva ma il valore dello sconto è nullo.');
        }

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            
            $auth = \Yii::$app->authManager;
            $business = $auth->getRole(User::ROLE_BUSINESS);
            $roles = $auth->getRolesByUser($model->user_id);

            if ($model->b2b == Profilo::B2B_ATTIVO) {
                if (!isset($roles[User::ROLE_BUSINESS])) {
                    $auth->assign($business, $model->user_id);
                }
            } else {
                if (isset($roles[User::ROLE_BUSINESS])) {
                    $auth->revoke($business, $model->user_id);
                }
            }
            $this->addOk();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('/profilo/update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Profilo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Profilo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Profilo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Profilo::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
