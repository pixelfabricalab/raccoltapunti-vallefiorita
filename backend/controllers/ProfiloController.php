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
    public function actionCreate()
    {
        $model = new Profilo();

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

        if ($this->request->isPost && $model->load($this->request->post()) && $this->process($model)) {

            $user = User::findOne($model->user_id);
            $user->username = $model->email;
            $user->save(false);

            $this->addOk();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        if ($model->b2b == $model::B2B_ATTIVO && !$model->valore_sconto) {
            $this->addWarning('Scheda B2B Attiva ma il valore dello sconto è nullo.');
        }

        return $this->render('update', [
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

    protected function getNewUser($model)
    {
        $user = new User();
        $user->username = $model->email;
        $user->email = $model->email;
        $user->setPassword($model->password);
        $user->status = User::STATUS_ACTIVE;
        $user->generateAuthKey();

        return $user;
    }

    protected function process($model)
    {
        if (is_null($model->user)) {
            $user = $this->getNewUser($model);
            if ($user->save()) {
                $model->user_id = $user->id;
            }
        }

        $model->creato_il = date('Y-m-d H:i:s');
        $model->modificato_il = $model->creato_il;
        $model->b2b = (int)$model->b2b;

        return $model->save() && $this->assignRevokePermissions($model);
    }

    protected function assignRevokePermissions($model)
    {
        $auth = \Yii::$app->authManager;

        $roles = $auth->getRolesByUser($model->user_id);

        $user_role = $auth->getRole(User::ROLE_SIMPLEUSER);
        if (!isset($roles[User::ROLE_SIMPLEUSER])) {
            $auth->assign($user_role, $model->user_id);
        }

        $business = $auth->getRole(User::ROLE_BUSINESS);
        if ($model->b2b == Profilo::B2B_ATTIVO) {
            if (!isset($roles[User::ROLE_BUSINESS])) {
                $auth->assign($business, $model->user_id);
            }
        } else {
            if (isset($roles[User::ROLE_BUSINESS])) {
                $auth->revoke($business, $model->user_id);
            }
        }
        return true;
    }
}
