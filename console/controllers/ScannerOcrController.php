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
          $dimensioni_scansione = [1600,2200,2800,3200];
          $modes_psm = [1,3];
          $engines_lstm = [1,2,3,6,11,12];
          $dpis_scansione = [300,400,600];
          $desks_foto = [0];
          $extension_to_search = array('jpg','png','jpeg','gif');
          $url = $request->getBaseUrl();
          $dir_scontrini_da_scansionare = "{$url}/frontend/web/uploads/scontrini/";
          $files = scandir($dir_scontrini_da_scansionare);
          $found = false;
          $count = 0;
          $task = 1;
          foreach($files as $key => $value) {
            $ext = pathinfo($value, PATHINFO_EXTENSION);
            if(in_array($ext,$extension_to_search)) {
              echo "file: {$count}\n"; 
                echo "file: {$value}\n";
                $count = 1;
                foreach($dimensioni_scansione as $dimensione) {
                  foreach($modes_psm as $mode) {
                    foreach($engines_lstm as $engine) {
                      foreach($dpis_scansione as $dpi) {
                        foreach($desks_foto as $desk) {
                          echo "task: {$task}:\n";
                          $response = $scanner->scanOCR($dir_scontrini_da_scansionare.$value, $dimensione, $mode, $engine, $dpi);
                          if ($response->content != NULL || $response->content != '') {
                            $output = "\n\nElaborazione OCR file {$value}:\n\nDettagli:\nDimensioni:{$dimensione}\nModo: {$mode}\nEngine:{$engine}\nDensità:{$dpi}\n\nRisultati scansione:\n{$response->content}";
                            $logger->logBatchOCROutput($output);
                            echo "file {$value} elaborato con successo con dimensione {$dimensione} - modo {$mode} - engine {$engine} - dpi {$dpi}.\n\n";
                            $task++;
                          } else {
                            ExitCode::IOERR;
                          }
                      }
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