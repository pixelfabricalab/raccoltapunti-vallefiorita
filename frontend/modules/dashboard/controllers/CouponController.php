<?php

namespace frontend\modules\dashboard\controllers;

use common\models\Scontrino;
use common\models\Coupon;
use common\models\CouponSearch;
use yii\filters\AccessControl;
use frontend\controllers\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ArrayDataProvider;

/**
 * CouponController implements the CRUD actions for Coupon model.
 */
class CouponController extends Controller
{

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['access']['rules'][] = [
            'allow' => true,
            'actions' => ['validate'],
            'roles' => ['validateQrCode'],
        ];

        return $behaviors;
    }

    /**
     * Lists all Coupon models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $provider = new ArrayDataProvider([
            'allModels' => \Yii::$app->user->identity->profilo->coupon,
            'sort' => [
                'attributes' => ['id', 'username', 'email'],
            ],
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
        return $this->render('index', [
            'dataProvider' => $provider,
        ]);
    }

    /**
     * Lists all Coupon models.
     *
     * @return string
     */
    public function actionValidate($mode = 'qr', $codice = null, $confirm = 0)
    {
        $model = new Coupon();

        $searchModel = new CouponSearch();
        $searchModel->load($this->request->queryParams);
        if ($searchModel->codice) {
            return $this->redirect(['validate', 'codice' => $searchModel->codice]);
        }
        if ($mode == 'qr') {
            $model = $this->findModel($codice);
        }
        if ((int)$confirm) {
            $model->utilizza();
            $this->addOk('Coupon validato con successo');
        }

        return $this->render('validate', [
            'model' => $model,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Lists all validated coupons
     *
     * @return string
     */
    public function actionReport()
    {
        $provider = new ArrayDataProvider([
            'allModels' => \Yii::$app->user->identity->profilo->coupon,
            'sort' => [
                'attributes' => ['id', 'username', 'email'],
            ],
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
        return $this->render('index', [
            'dataProvider' => $provider,
        ]);
    }

    /**
     * Displays a single Coupon model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Coupon model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($sid)
    {
        $model = new Coupon();
        $model->loadDefaultValues();
        $scontrino = Scontrino::findOne(['sid' => $sid]);
        $model->scontrino_id = $scontrino->id;

        if ($scontrino->coupon) {
            $this->addWarning('Coupon GIA\' richiesto per questo scontrino.');
        } else if ($model->save(false)) {
            $this->addOk('Coupon creato con successo');
        }

        return $this->redirect(['coupon/index']);
    }

    /**
     * Updates an existing Coupon model.
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

    /**
     * Deletes an existing Coupon model.
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
     * Finds the Coupon model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Coupon the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Coupon::findOne(['id' => $id])) !== null || ($model = Coupon::findOne(['codice' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Coupon non trovato.');
    }
}
