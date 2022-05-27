<?php
    namespace console\controllers;
    use Yii;
    use yii\console\Controller;
    use common\components\ScontrinoHelper;
    use common\components\LoggerHelper;
    use common\components\Request;
    use yii\helpers\Url;
    use yii\console\ExitCode;

    class ScannerOcrController extends Controller {
        
        public function actionIndex($search = 'test')
        {
          echo $search;
        }

        public function actionScan() {
          $request = new Request;
          $logger = new LoggerHelper;
          $scanner = new ScontrinoHelper;
          $modes_psm = [1,2,3];
          $engines_lstm = [1,2,3];
          $dpis_scansione = [200,300,400];
          $desks_foto = [0,1];
          $extension_to_search = array('jpg','png','jpeg','gif');
          $url = $request->getBaseUrl();
          $dir_scontrini_da_scansionare = "{$url}/frontend/web/uploads/scontrini/";
          $files = scandir($dir_scontrini_da_scansionare);
          $found = false;
          $count = 0;
          foreach($files as $key => $value) {
            $ext = pathinfo($value, PATHINFO_EXTENSION);
            if(in_array($ext,$extension_to_search)) {
                echo "file: {$value}\n";
                foreach($modes_psm as $mode) {
                  foreach($engines_lstm as $engine) {
                    foreach($dpis_scansione as $dpi) {
                      foreach($desks_foto as $desk) {
                        $response = $scanner->scanOCR($dir_scontrini_da_scansionare.$value, $mode, $engine, $dpi,$desk);
                        $output = "Elaborazione OCR file {$value}:\n\nDettagli:\nModo: {$mode}\nEngine:{$engine}\n,Densità:{$dpi}\nDesk:{$desk}\n\nRisultati scansione:\n{$response->content}";
                        //$logger->logBatchOCROutput($output);
                        echo "file {$value} elaborato con successo con modo {$mode} - engine {$engine} - dpi {$dpi} - desk {$desk}.\n\n";
                      }
                    }
                  }
                }
                $count++;
                move_uploaded_file($dir_scontrini_da_scansionare.$value, "{$url}/frontend/web/uploads/elapsed/{$value}");
            }
        }
        echo "Conto totale file: {$count}";
        }
    }