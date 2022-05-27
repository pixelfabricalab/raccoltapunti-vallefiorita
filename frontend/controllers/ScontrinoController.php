<?php

namespace frontend\controllers;

use frontend\models\Scontrino;
use frontend\models\ScontrinoSearch;
use frontend\models\ScontrinoData;
use frontend\models\ProdottiScontrinoData;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\components\LoggerHelper;
use common\components\ScontrinoHelper;
use yii\web\UploadedFile;
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
    
        if (!\Yii::$app->user->can('navigasemplice')) {
            return $this->redirect(['site/login']);
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
        
        $datamodel = ScontrinoData::find()->where(['id_scontrino' => $id])->all();
        //$dataprodottimodel = ProdottiScontrinoData::find()->where(['id_scontrino_data' => $datamodel[0]->getId()])->all();

        return $this->render('view', [
            'model' => $this->findModel($id),
            'datamodel' => $datamodel,
            //'dataprodottimodel' => $dataprodottimodel,
        ]);
    }

    /**
     * Creates a new Scontrino model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Scontrino();
        $modeldata = new ScontrinoData();
        $modelprodottidata = new ProdottiScontrinoData();

        $helper = new ScontrinoHelper();
        $logger = new LoggerHelper();

        if ($this->request->isPost) {
            $model->load($this->request->post());
            $model->imageFile = UploadedFile::getInstance($model, 'nomefile');
            $fileparams = $model->upload();
            if ($fileparams !== false) {
                $complete = explode(".", $model->imageFile->name);
                $filename = $fileparams['filename'];
                $extension = $fileparams['extension'];
                $model->nomefile = $fileparams['filename'] . '.' . $fileparams['extension'];
                $model->hashnomefile = $fileparams['hashfilename'];
                $model->estensionefile = $fileparams['extension'];
                $model->id_proprietario = Yii::$app->user->id;
                $model->data_caricamento = date('Y-m-d H:i:s');
                $model->nomefile = './uploads/scontrini/' . $fileparams['hashfilename']. '.'. $fileparams['extension'];
                $model->dimensione = $fileparams['size'];
                $model->tmpfilename = $fileparams['tempName'];
                $model->mimetype = $fileparams['mimetype'];
                $json = $helper->scanOCR($model->nomefile, $model->modoscansione, $model->enginescansione, $model->dpiscansione, $model->raddrizzascansione);
                $log_ocr_content = "Scansione OCR \n ======== \n File scansionato: ". $fileparams['filename'] . "." . $fileparams['extension'] . "\n Rif. server file: " . $model->nomefile . "\n Contenuto Scansione OCR: ". $json->content ."\n ======== \n\n";
                $logger->logOCROutput($log_ocr_content);
                //popola il campo numero prodotti a 0, servirà per ciclare i prodotti nello scontrino
                // if modeldatanumeroprodotti = 0 -- cicla i prodotti e scrivili nella tabella.
                if ($model->save()) {
                // popola i campi per la demo
                $modeldata->id_scontrino = $model->id;
                // set campi a null in attesa della procedura di Alessandro
                $modeldata->rfscontrino = null;
                $modeldata->numerodocumento = null;
                $modeldata->dataemissione = null;
                $modeldata->ragionesociale = null;
                $modeldata->indirizzo = null;
                $modeldata->provincia = null;
                $modeldata->citta = null;
                $modeldata->cap = null;
                $modeldata->telefono = null;
                $modeldata->piva = null;
                $modeldata->pivaisvalid = 0;
                $modeldata->pivaisvies = 0;
                $modeldata->dati_validi = 0;
                // popola il campo outputocr
                $modeldata->outputocr = $json->content;
                if ($modeldata->save()) {
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                }
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
}