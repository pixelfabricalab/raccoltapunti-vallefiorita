<?php

namespace frontend\modules\dashboard\controllers;

use common\models\Scontrino;
use common\models\ScontrinoSearch;
use common\models\ScontrinoData;
use common\models\ProdottiScontrinoData;
use yii\data\ArrayDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use common\components\ScontrinoHelper;
use Yii;

/**
 * ScontrinoController implements the CRUD actions for Scontrino model.
 */
class ScontrinoController extends Controller
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
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }
    public function beforeAction($action)
    {
        if (!parent::beforeAction($action)) {
            return false;
        }
    
        return true; // or false to not run the action
    }



    /**
     * Lists all Scontrino models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ScontrinoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Scontrino model.
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

    public function actionOcr($id)
    {
        $model = $this->findModel($id);
        $model->content = \Yii::$app->ocr->getContent($model->filename);
        $model->save(false);

        // $this->addOk();
        return $this->redirect(['view', 'id' => $id]);
    }

    public function actionAnalyze($id)
    {
        $model = $this->findModel($id);
        $model->analyze();
        $model->save(false);

        // $this->addOk();
        return $this->redirect(['view', 'id' => $id]);
    }

    /**
     * Creates a new Scontrino model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Scontrino();
        if ($this->request->isPost) {
            $model->load($this->request->post());
            $model->imageFile = UploadedFile::getInstance($model, 'nomefile');
            if ($model->upload() && $model->save(false)) {
                Yii::$app->getSession()->addFlash('success', 'Scontrino caricato con successo. Riceverai una notifica quando il sistema elaborerà le informazioni.');
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
     * Finds the Scontrino model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Scontrino the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Scontrino::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionTracciato() {
        $dummyocr = ScontrinoHelper::dummyOCR();

        return $this->render('/debug/tracciato', [
            'dummyocr' => $dummyocr
        ]);
    }

}