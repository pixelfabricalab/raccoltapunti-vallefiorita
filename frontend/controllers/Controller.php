<?php
namespace frontend\controllers;

use yii\web\Controller as Base;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use common\models\Allegato;
use yii\data\ActiveDataProvider;
use yii\mongodb\Query;

class Controller extends Base
{
    public $showToolbar = true;

    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => AccessControl::class,
                    'rules' => [
                        [
                            'actions' => ['login', 'error', 'pdf'],
                            'allow' => true,
                        ],
                        [
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                    ],
                ],
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
     * @inheritDoc
     */
    public function beforeAction($action)
    {
        if ($this->request->get('selection')) {
            $this->layout = '//selection';
        }

        if (\Yii::$app->request->get('backto') && \Yii::$app->request->get('ref')) {
            $backto = \Yii::$app->request->get('backto');
            $parts = explode('/', $backto);

            // #TODO gestire eventuali redirect da moduli interni, che hanno più parti nell'url
            if (count($parts) == 1) {
                $backto .= '/update';
            }
            \Yii::$app->user->returnUrl = \yii\helpers\Url::toRoute([$backto, 'id' => \Yii::$app->request->get('ref')]);
        }
        return parent::beforeAction($action);
    }

    /**
     * Redirect always to edit form
     * @param string $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->redirect(['update', 'id' => $id]);
    }

    /**
     * Deletes an existing model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        $this->addOk();

        return $this->redirect(['index']);
    }

    public function addOk($message = 'Operazione completata con successo.')
    {
        \Yii::$app->session->addFlash('success', $message);
    }

    public function addKo($message = 'Operazione non completata.')
    {
        \Yii::$app->session->addFlash('danger', $message);
    }

    public function addWarning($message = 'Operazione non permessa.')
    {
        \Yii::$app->session->addFlash('warning', $message);
    }

    public function actionEmail()
    {
        $this->addWarning('Invio email non consentita in questa area');
        return $this->goBack();
    }

    public function actionDownload($id)
    {
        // Ricava allegato
        $model = Allegato::findOne($id);
        $file = $model->filepath . $model->nome_file;
        $downloader = \Yii::$app->downloader;

        $downloader->download(\Yii::getAlias($file));
    }

    public function stampaMultipla($ids = [])
    {
        $this->layout = 'print';
    }
}