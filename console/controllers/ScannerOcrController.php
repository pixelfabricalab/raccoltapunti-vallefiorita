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

        public function actionScan($test = false) {
          // inizializza i costruttori necessari per lo script
          $request = new Request;
          $logger = new LoggerHelper;
          $scanner = new ScontrinoHelper;
          
          // condizione per scansionare solo 1 modalità - necessaria per test
          if ($test == true) {
            $dimensioni_scansione = [3200];
            $modes_psm = [3];
            $engines_lstm = [3];
            $dpis_scansione = [600];
            $desks_foto = [0];
            $log_file = "_batchocroutput_TEST.log";
            $logcli_file = "_cli_TEST.log";
            $mail = false;
          } else {
            // array per dimensioni
            $dimensioni_scansione = [1600,2200,2800,3200];
            // array per modalità di segmentazione pagina
            $modes_psm = [1,3];
            // array per engine segmentazione pagina
            $engines_lstm = [1,2,3,6,11,12];
            // array per dpi scansione 
            $dpis_scansione = [300,400,600];
            // array con valori boolean: 0 e 1 per attivare e disattivare funzione di raddrizzamento automatico - non utilizzata su suggerimento di Ale. Non funziona bene.
            $desks_foto = [0];
            // numero di scansioni totali per file: 144

            //file di log delle elaborazioni OCR
            $log_file = "_batchocroutput.log";
            //file di log dell'output cli
            $logcli_file = "_cli.log";
            $mail = true;
          }
          
          // array di estensioni di file valevoli per la scansione
          $extension_to_search = array('jpg','png','jpeg','gif');

          // individua l'url base
          $url = $request->getBaseUrl();

          // directory contenente gli scontrini da scansionare
          $dir_scontrini_da_scansionare = "{$url}/frontend/web/uploads/scontrini/";
          
          // funzione per scansionare il numero di file nella cartella
          $files = scandir($dir_scontrini_da_scansionare);
          var_dump($files);
          $found = false;
          
          // inizializzo i contatori a 0 e a 1. mi servono per contare i file elaborati e i task per ogni file.
          $count = 1;
          $task = 1;
          $attempts = 1;
          // primo ciclo - per ogni file presente nell'array files, verifica che si tratti di un'immagine
          foreach($files as $file) {
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            // controllo a monte per verificare che i file nella cartella siano immagini
            if(in_array($ext,$extension_to_search)) {
              echo "file: {$count}\n"; 
                echo "file: {$file}\n";
                $count++;
                // inizio i cicli delle scansioni
                  // 1. ciclo per array dimensioni
                foreach($dimensioni_scansione as $dimensione) {
                  // 2. ciclo per array modi
                  foreach($modes_psm as $mode) {
                  // 3. ciclo per array engines
                    foreach($engines_lstm as $engine) {
                  // 4. ciclo per array dpi
                      foreach($dpis_scansione as $dpi) {
                  // 5. ciclo per array desk - non utilizzato e settato fisso a 0.
                        foreach($desks_foto as $desk) {
                          echo "task: {$task}:\n";
                          // chiamata della funzione scanOCR dall'helper ScontrinoHelper con il passaggio dei nuovi argomenti della funzione
                          $response = $scanner->scanOCR($dir_scontrini_da_scansionare.$file, $dimensione, $mode, $engine, $dpi);
                          // se il contenuto della risposta è vuota (per il momento) interrompi lo script
                          if ($response->content != NULL || $response->content != '') {
                            $output = "\n\nElaborazione OCR file {$file}:\n\nDettagli:\nDimensioni:{$dimensione}\nModo: {$mode}\nEngine:{$engine}\nDensità:{$dpi}\n\nRisultati scansione:\n{$response->content}";
                            // chiamata della funzione logBatchOCROutput dall'helper LoggerHelper
                            $logger->logBatchOCROutput($output, $log_file);
                            if ($test) {
                              $demo = "demo:\n";
                            } else {
                              $demo = "";
                            }
                            $cli_out = "{$demo} file {$file} elaborato con successo con dimensione {$dimensione} - modo {$mode} - engine {$engine} - dpi {$dpi}.\n\n";
                            echo $cli_out;
                            $logger->logCLIWorks($cli_out, $logcli_file);
                            // incrementa task al termine della singola scansione.
                            $task++;
                            continue;
                          } else {
                            // esce con errore I/O se response->content è vuota o Null
                            $attempts++;
                            echo $attempts;
                            break;
                          }
                      }
                    }
                  }
                }
              }    
                // to fix: sposta il file in un'altra directory in modo che uploads risulti sempre vuota. NON FUNZIONA?
                rename($dir_scontrini_da_scansionare.$file, "{$url}/frontend/web/uploads/elapsed/{$file}");
                $task = 1;
                // todo: implementare sistema di salvataggio output alla fine di ogni task, implementare sistema di avviso mail e invio dell'allegato _batchocroutput.log tramite mail a me, ad Alessandro e a Fabrizio.
            }
          if ($attempts == 3) {
            break;
          }
        }
        echo "Conto totale file: {$count}";
        return ExitCode::OK;
        }
    }