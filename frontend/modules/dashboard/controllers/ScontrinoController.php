<?php

namespace frontend\modules\dashboard\controllers;

use common\models\Scontrino;
use common\models\ScontrinoSearch;
use common\models\ScontrinoData;
use common\models\ProdottiScontrinoData;
use common\components\DirectoryCrawler;
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
        
        $datamodel = ScontrinoData::find()->where(['id_scontrino' => $id])->one();
        $dataprodottimodel = ProdottiScontrinoData::find()->where(['id_scontrino_data' => $datamodel->getId()])->all();
        $provider_dataprodotti = new ArrayDataProvider([
            'allModels' => $dataprodottimodel,
            'sort' => [
                'attributes' => ['nomeprodotto', 'prezzo_prodotto', 'numeropunti'],
            ],
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'datamodel' => $datamodel,
            'provider_dataprodotti' => $provider_dataprodotti,
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
                //$model->nomefile = '/home/pixel/public_html/frontend/web/uploads/scontrini/' . $fileparams['hashfilename']. '.'. $fileparams['extension'];
                $model->nomefile = \Yii::getAlias('@webroot') .'/uploads/scontrini/' . $fileparams['hashfilename']. '.'. $fileparams['extension'];
                // $model->nomefile = '/mnt/archivio/localhost/demoapp-raccoltapunti/frontend/web/uploads/scontrini/' . $fileparams['hashfilename']. '.'. $fileparams['extension'];
                $model->dimensione = $fileparams['size'];
                $model->tmpfilename = $fileparams['tempName'];
                $model->mimetype = $fileparams['mimetype'];
                $model->is_elapsed = 0;
                //popola il campo numero prodotti a 0, servirà per ciclare i prodotti nello scontrino
                // if modeldatanumeroprodotti = 0 -- cicla i prodotti e scrivili nella tabella.
                if ($model->save()) {
                    // lancia scansione ocr
                    // scansione ocr Asprise -- commenta la riga se vuoi utilizzare la scansione finta
                    //$scansione_ocr = ScontrinoHelper::scanOCRAsprise($model->nomefile);
                    // scansione con dati ocr finti -- copiato lo stesso identico tracciato JSON di Asprise.
                    $scansione_ocr = ScontrinoHelper::dummyOCR();
                    $model_scontrino_data = new ScontrinoData;
                    $model_scontrino_data->id_scontrino = $model->id;

                    //se si utilizza dummy OCR
                    $model_scontrino_data->rfscontrino = $scansione_ocr['receipts'][0]['rfscontrino'];
                    //$model_scontrino_data->rfscontrino = null;
                    $model_scontrino_data->numerodocumento = $scansione_ocr['receipts'][0]['receipt_no'];
                    $model_scontrino_data->dataemissione = $scansione_ocr['receipts'][0]['date'];
                    $model_scontrino_data->ragionesociale = $scansione_ocr['receipts'][0]['merchant_name'];
                    $model_scontrino_data->indirizzo = $scansione_ocr['receipts'][0]['merchant_address'];
                    $model_scontrino_data->provincia = $scansione_ocr['receipts'][0]['country'];
                    $model_scontrino_data->citta = null;
                    $model_scontrino_data->cap = null;
                    $model_scontrino_data->telefono = null;
                    $model_scontrino_data->piva = $scansione_ocr['receipts'][0]['merchant_tax_reg_no'];
                    $model_scontrino_data->pivaisvalid = 1;
                    $model_scontrino_data->pivaisvies = 0;
                    $model_scontrino_data->dati_validi = 1;
                    $model_scontrino_data->save();
                    foreach ($scansione_ocr['receipts'][0]['items'] as $prodotto) {
                        $model_prodotto_data = new ProdottiScontrinoData;
                        $model_prodotto_data->id_scontrino_data = $model_scontrino_data->id;
                        $model_prodotto_data->nomeprodotto = $prodotto['description'];
                        $model_prodotto_data->prezzo_prodotto = $prodotto['amount'];
                        $model_prodotto_data->tipo_prodotto = "non specificato";
                        $model_prodotto_data->iva_prodotto = null;
                        if ($prodotto["qty"] > 1) {
                            $model_prodotto_data->multiprodotto = 1;
                            $model_prodotto_data->conteggio_stesso_prodotto_per_riga = $prodotto["qty"];
                        } else {
                            $model_prodotto_data->multiprodotto = 0;
                            $model_prodotto_data->conteggio_stesso_prodotto_per_riga = $prodotto["qty"];
                        }
                        
                        $model_prodotto_data->punti_per_prodotto = rand(0,10);

                        if ($model_prodotto_data->multiprodotto = 1) {
                            $model_prodotto_data->numeropunti = $model_prodotto_data->punti_per_prodotto * $model_prodotto_data->conteggio_stesso_prodotto_per_riga;
                        } else {
                            $model_prodotto_data->numeropunti = $model_prodotto_data->punti_per_prodotto;
                        };
                        
                        if($model_prodotto_data->save(false)) {
                            var_dump($model_prodotto_data->errors);
                        } 
                    }
                    Yii::$app->getSession()->addFlash('success', 'Scontrino caricato con successo. Riceverai una notifica quando il sistema elaborerà le informazioni.');

                    return $this->redirect(['view', 'id' => $model->id]);
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

    public function actionTracciato() {
        $dummyocr = ScontrinoHelper::dummyOCR();

        return $this->render('/debug/tracciato', [
            'dummyocr' => $dummyocr
        ]);
    }

}