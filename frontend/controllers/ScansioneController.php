<?php 
namespace frontend\controllers; 

use common\models\ScansioneTest;
use Yii;
use yii\web\Controller;
use yii\web\Response;
use yii\helpers\Json;

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
}