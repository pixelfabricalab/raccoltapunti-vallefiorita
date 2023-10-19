<?php

namespace frontend\modules\dashboard\controllers;

use common\models\Profilo;
use common\models\ProfiloSearch;
use frontend\controllers\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * ProfiloController implements the CRUD actions for Profilo model.
 */
class ProfiloController extends Controller
{

    /**
     * Lists all Profilo models.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->redirect(['update', 'id' => \Yii::$app->user->identity->profilo->id]);
    }

    /**
     * Displays a single Profilo model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->redirect(['update', 'id' => \Yii::$app->user->identity->profilo->id]);
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
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
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

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionPhoto()
    {
        $model = new Scontrino();
        if ($this->request->isPost) {
            $model->load($this->request->post());
            $model->imageFile = UploadedFile::getInstance($model, 'nomefile');
            if ($model->upload() && $model->save(false)) {
                $this->addOk('Scontrino caricato con successo.');
                return $this->redirect(['exec', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }
        
        return $this->render('create', [
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
