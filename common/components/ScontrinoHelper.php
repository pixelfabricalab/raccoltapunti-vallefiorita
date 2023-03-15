<?php
    namespace common\components;

    use yii\web\Response;

    class ScontrinoHelper {

        public function scanOCRAsprise($nomefile) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, \Yii::$app->params['endpoint_server_aspriseocr']);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            // passa i campi in POST alla curl
            curl_setopt($ch, CURLOPT_POSTFIELDS, array(
            'api_key' => \Yii::$app->params['api_key_asprise'],      // Use 'TEST' for testing purpose
            'recognizer' => \Yii::$app->params['recognizer'],     // can be 'US', 'CA', 'JP', 'SG' or 'auto'
            'ref_no' => \Yii::$app->params['ref_no'],  // optional caller provided ref code
            'file' => curl_file_create($nomefile) // the image file
            ));


            $response_curl = curl_exec($ch);
            // inizializzo response come un oggetto di tipo Response
            $response = new Response;
            // dichiaro che il formato della risposta che voglio ricevere è di tipo JSON
            $response->format = Response::FORMAT_JSON;
            // associo al contenuto di response la stringa generata precedentemente
            $response = $response_curl;

            curl_close($curl);
            return $response;
        }

        // scanner tesseract Alessandro Testa - da dismettere e da rimpiazzare successivamente

        public function scanOCR($nomefile, $dimensione, $modo, $engine, $dpi) {
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => \Yii::$app->params['endpoint_server_ocr'],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('image'=> new \CURLFILE($nomefile), 'dimensione' => "{$dimensione}",'modo' => "{$modo}",'engine' => "{$engine}", 'densita' => "{$dpi}"),
            ));

            $response_curl = curl_exec($curl);
            // inizializzo response come un oggetto di tipo Response
            $response = new Response;
            // dichiaro che il formato della risposta che voglio ricevere è di tipo JSON
            $response->format = Response::FORMAT_JSON;
            // associo al contenuto di response la stringa generata precedentemente
            $response->content = $response_curl;

            curl_close($curl);
            return $response;
        }

        public function validaJSON(string $response) {
            if ($response != null) {
                return false;
            } else {
                return true;
            }
        }
        
        public function isScontrinoValid($response) {
            return true;
        }

        public function getScontrinoData($response) {
            return true;
        }
    }