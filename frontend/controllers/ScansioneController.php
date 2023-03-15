<?php 
namespace frontend\controllers; 

use Yii;
use yii\web\Controller;
use yii\web\Response;
use yii\helpers\Json;
use common\models\Scontrino;
use common\models\ScansioneTest;

class ScansioneController extends Controller {

    public function actionGetall() {
        $risultati = ScansioneTest::find()
        ->indexBy('id')
        ->all();
        $json = Json::encode($risultati, 0, 512);
        // inizializzo response come un oggetto di tipo Response
        $response = new Response;
        // dichiaro che il formato della risposta che voglio ricevere è di tipo JSON
        $response->format = Response::FORMAT_JSON;
        // associo al contenuto di response la stringa generata precedentemente
        $response->content = $json;

       return $response; 
    }

    public function actionNuova() {
        
        $model = new Scontrino();
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
}