<?php

namespace frontend\modules\dashboard\controllers;

use common\models\Scontrino;
use common\models\ScontrinoSearch;
use common\components\DirectoryCrawler;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
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
        
        //$datamodel = ScontrinoData::find()->where(['id_scontrino' => $id])->all();
        //$dataprodottimodel = ProdottiScontrinoData::find()->where(['id_scontrino_data' => $datamodel[0]->getId()])->all();

        return $this->render('view', [
            'model' => $this->findModel($id),
            //'datamodel' => $datamodel,
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
                $model->is_elapsed = 0;
                //popola il campo numero prodotti a 0, servirà per ciclare i prodotti nello scontrino
                // if modeldatanumeroprodotti = 0 -- cicla i prodotti e scrivili nella tabella.
                if ($model->save()) {
                    Yii::$app->getSession()->addFlash('success', 'Scontrino caricato con successo. Riceverai una notifica quando il sistema elaborerà le informazioni.');
                    $this->redirect(['create']);
                }
            }
        } else {
            $model->loadDefaultValues();
        }
        $crawler = new DirectoryCrawler;
        $numero_scontrini = $crawler->countFiles("./uploads/scontrini/");
        
        return $this->render('create', [
            'model' => $model,
            'numero_scontrini' => $numero_scontrini
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

    public function actionElabora()
    {
        // Recupera coda di elaborazione

        /*
            --form 'engine="3"' \
            --form 'densita="300"' \
            --form 'segment="3"' \
            --form 'dimensione="2800"'
        */
        $file_scontrino = '/home/pixel/tmp/photo_2022-12-21_10-33-14.jpg';
        $params = \Yii::$app->params;
        // per ogni elemento scansiona
        $scanner = new ScontrinoHelper;
        $response = \Yii::$app->scanner->scanOCR($file_scontrino, $params['dimensione'], $params['engine'], $params['segment'], $params['densita']);

        // salva risultato
        if ($response && $response->content) {
            $model_scansione = new ScansioneTest;
            $datedb = date("Y-m-d H:i:s");
            $model_scansione->id_scontrino = 152;
            $model_scansione->nome_scontrino = $file_scontrino;
            $model_scansione->dataora_scansione = $datedb;
            $model_scansione->modo_scansione = $params['segment'];
            $model_scansione->engine_scansione = $params['engine'];
            $model_scansione->dpi_scansione = $params['densita'];
            $model_scansione->risoluzione = $params['dimensione'];
            $model_scansione->task = 1;
            $model_scansione->desk = 0;
            $model_scansione->has_valid_content = 1;
            $model_scansione->is_mail_sent = 0;
            $model_scansione->is_test = 0;

            $scontrino_data = json_decode($response->content);
            $model_scansione->piva = $scontrino_data->piva;
            $model_scansione->datascontrino = $scontrino_data->data;
            $model_scansione->ndoc = $scontrino_data->nDoc;
            $model_scansione->lista_articoli = json_encode($scontrino_data->listarticoli);
            $model_scansione->testo_rw = $scontrino_data->testoRW;
            $model_scansione->save();
            die("Elaborazione ok");
        } else {
            die("Elaborazione KO");
        }

    }

}