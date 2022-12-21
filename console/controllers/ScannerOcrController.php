<?php
    namespace console\controllers;
    use Yii;
    use yii\console\Controller;
    use common\components\ScontrinoHelper;
    use common\components\MailerHelper;
    use common\components\LoggerHelper;
    use common\components\Request;
    use common\models\ScansioneTest;
    use common\models\Scontrino;
    use Exception;
    use yii\helpers\Url;
    use yii\console\ExitCode;

    class ScannerOcrController extends Controller {
        
        public function actionDemo()
        {
            // Recupera coda di elaborazione

            /*
                --form 'engine="3"' \
                --form 'densita="300"' \
                --form 'segment="3"' \
                --form 'dimensione="2800"'
            */
            $file_scontrino = '/home/pixel/tmp/photo_2022-12-21_10-33-14.jpg';
            $params = [
                'engine' => 3,
                'densita' => 300,
                'segment' => 3,
                'dimensione' => 2800,
            ];
            // per ogni elemento scansiona
            $scanner = new ScontrinoHelper;
            $response = $scanner->scanOCR($file_scontrino, $params['dimensione'], $params['engine'], $params['segment'], $params['densita']);

            // salva risultato
            if ($response && $response->content) {
                $model_scansione = new ScansioneTest;
                $datedb = date("Y-m-d H:i:s");
                $model_scansione->id_scontrino = 152;
                $model_scansione->nome_scontrino = $file;
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
            }
        }

        public function actionIndex($search = 'test')
        {
          echo $search;
        }

        // funzione per ritornare il nomefile senza estensione
        public function getFilename($filename) {
          $parts = explode('.', $filename);
          $name = $parts[0];
          return $name;
        }

        public function actionScan($test = false) {
          // inizializza i costruttori necessari per lo script
          $request = new Request;
          $logger = new LoggerHelper;
          $scanner = new ScontrinoHelper;
          $mailer = new MailerHelper;
          
          // condizione per scansionare solo 1 modalità - necessaria per test
          if ($test == true) {
            $dimensioni_scansione = [3200];
            $modes_psm = [3];
            $engines_lstm = [3];
            $dpis_scansione = [600];
            $desks_foto = [0];
            $log_file = "_batchocroutput_TEST.txt";
            $logcli_file = "_cli_TEST.txt";
            $move_files = false;
            $mail = false;
            $testmail = true;
          } else {
            // array per dimensioni
            $dimensioni_scansione = [2800];
            // array per modalità di segmentazione pagina
            $modes_psm = [3];
            // array per engine segmentazione pagina
            $engines_lstm = [3];
            // array per dpi scansione 
            $dpis_scansione = [300];
            // array con valori boolean: 0 e 1 per attivare e disattivare funzione di raddrizzamento automatico - non utilizzata su suggerimento di Ale. Non funziona bene.
            $desks_foto = [0];
            // numero di scansioni totali per file: 144

            //file di log delle elaborazioni OCR
            $log_file = "_batchocroutput.txt";
            //file di log dell'output cli
            $logcli_file = "_cli.txt";
            $mail = true;
            $move_files = true;
            $testmail = false;
          }
          
          // array di estensioni di file valevoli per la scansione
          $extension_to_search = array('jpg','png','jpeg','gif');

          // individua l'url base
          $url = $request->getBaseUrl();

          // directory contenente gli scontrini da scansionare
          $dir_scontrini_da_scansionare = "{$url}/frontend/web/uploads/scontrini/";
          
          // funzione per scansionare il numero di file nella cartella - agg.to - esclude . e .. dalla lista.
          $files = array_diff(scandir($dir_scontrini_da_scansionare), array('..', '.'));
          $found = false;
          
          // inizializzo i contatori a 0 e a 1. mi servono per contare i file elaborati e i task per ogni file.
          $count = 0;
          $task = 1;
          $attempts = 1;

          // verifica che il server sia raggiungibile prima di qualsiasi azione
          $host = '192.168.10.4'; 
          $port = 8090; 
          $waitTimeoutInSeconds = 1; 
          // verifica che il server risponda aprendo un socket con i parametri assegnati
          try {
          $fp = fsockopen($host, $port, $errno, $errstr, $waitTimeoutInSeconds);
          // primo ciclo - per ogni file presente nell'array files, verifica che si tratti di un'immagine
          foreach($files as $file) {
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            // controllo a monte per verificare che i file nella cartella siano immagini
            if(in_array($ext,$extension_to_search)) {
              echo "file: {$count}\n"; 
                echo "file: {$file}\n";
                $output = "Link al file: https://demoapp-raccoltapunti.pixelfabrica.it/frontend/web/uploads/elapsed/{$file}";
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
                          $model_scansione = new ScansioneTest;
                          $hashname = $this->getFilename($file);
                          $model_scontrino = Scontrino::find()
                          ->where(['hashnomefile' => $hashname])
                          ->one();
                          echo "task: {$task}:\n";
                          // chiamata della funzione scanOCR dall'helper ScontrinoHelper con il passaggio dei nuovi argomenti della funzione
                          $response = $scanner->scanOCR($dir_scontrini_da_scansionare.$file, $dimensione, $mode, $engine, $dpi);
                          // se il contenuto della risposta è vuota (per il momento) interrompi lo script
                          if ($response->content != NULL || $response->content != '') {
                            $date = date("d-m-Y H:i:s");
                            $datedb = date("Y-m-d H:i:s");
                            $model_scansione->id_scontrino = $model_scontrino->id;
                            $model_scansione->nome_scontrino = $file;
                            $model_scansione->dataora_scansione = $datedb;
                            $model_scansione->task = $task;
                            $model_scansione->modo_scansione = $mode;
                            $model_scansione->engine_scansione = $engine;
                            $model_scansione->dpi_scansione = $dpi;
                            $model_scansione->risoluzione = $dimensione;
                            $model_scansione->desk = $desk;
                            $model_scansione->has_valid_content = 1;
                            if ($mail) {
                              $model_scansione->is_mail_sent = 1;
                            } else {
                              $model_scansione->is_mail_sent = 0;                              
                            }
                            if ($test) {
                              $model_scansione->is_test = 1;  
                            } else {
                              $model_scansione->is_test = 0;  
                            }
                            $scontrino_data = json_decode($response->content);
                        
                            $model_scansione->piva = $scontrino_data->piva;
                            $model_scansione->datascontrino = $scontrino_data->data;
                            $model_scansione->ndoc = $scontrino_data->nDoc;
                            $model_scansione->lista_articoli = json_encode($scontrino_data->listarticoli);
                            $model_scansione->testo_rw = $scontrino_data->testoRW;
                            $model_scansione->save();
                            
                            $output .= "\n\nData: {$date}\nElaborazione OCR file {$file}:\n\nDettagli:\nDimensioni:{$dimensione}\nModo: {$mode}\nEngine:{$engine}\nDensità:{$dpi}\n\nRisultati scansione:\n{$response->content}\n\n";
                            // chiamata della funzione logBatchOCROutput dall'helper LoggerHelper
                            $logger->logBatchOCROutput($output, $log_file);
                            if ($test) {
                              $demo = "demo:\n";
                            } else {
                              $demo = "";
                            }
                            $cli_out = "{$demo}data e ora: {$date}\n file {$file} elaborato con successo con dimensione {$dimensione} - modo {$mode} - engine {$engine} - dpi {$dpi}.\n\n";
                            echo $cli_out;
                            $logger->logCLIWorks($cli_out, $logcli_file);
                            // incrementa task al termine della singola scansione.
                            $task++;
                            continue;
                          } else {
                            // esce con errore I/O se response->content è vuota o Null
                            $attempts++;
                            $cli_out = "Il server JAVA non risponde o non è possibile elaborare lo scontrino\n";
                            $logger->logCLIWorks($cli_out, $logcli_file);
                            $esito = "Il server JAVA non risponde o non è possibile elaborare lo scontrino\n";
                            echo $cli_out;
                            ExitCode::NOHOST;
                            break;
                          }
                      }
                    }
                  }
                }
              } 
                if ($move_files) {
                  rename($dir_scontrini_da_scansionare.$file, "{$url}/frontend/web/uploads/elapsed/{$file}");
                }
                $task = 1;
                $model_scontrino->is_elapsed = 1;
                $model_scontrino->save();
                // todo: aimplementare sistema di salvataggio output alla fine di ogni task, implementare sistema di avviso mail e invio dell'allegato _batchocroutput.txt tramite mail a me, ad Alessandro e a Fabrizio.
            }
                if ($attempts == 3) {
                  $oggetto = "Pixelfabrica | Motore OCR - Errore di rete, il server non risponde";
                  $titolo = "Errore di rete, il server non risponde";
                  $cli_out = "Il server JAVA non risponde o non è possibile elaborare lo scontrino";
                  $logger->logCLIWorks($cli_out, $logcli_file);
                  $esito = "Il server JAVA non risponde o non è possibile elaborare lo scontrino";
                  echo $cli_out;
                  $model_scontrino->is_elapsed = 0;
                  $model_scontrino->save();
                  break;
                } 
              }
              if ($count == 0) {
                $data_esecuzione = date("d-m-Y H:i:s");
                $oggetto = "Pixelfabrica | Motore OCR - Directory vuota";
                $titolo = "Directory vuota";
                $cli_out = "\n\n{$data_esecuzione}\nNon ci sono file validi da elaborare. Termino l'elaborazione.\n\n";
                echo $cli_out;
                $logger->logCLIWorks($cli_out, $logcli_file);
                $esito ="Directory file vuota, cron saltato.";
              } else {
                $oggetto = "Pixelfabrica | Motore OCR - Elaborazione OCR con CRON completata";
                $titolo = "Elaborazione OCR con CRON completata";
                $esito = "Scansione completata correttamente.";
                echo "Conto totale file: {$count}";
              }
              if ($mail) {
                $mailer->inviaMail($oggetto, $titolo, $esito, $testmail);
              }
        return ExitCode::OK; 
      }
        catch(\Exception $ex) { //used back-slash for global namespace
          $oggetto = "Pixelfabrica | Motore OCR - Errore di rete, il server non risponde";
          $titolo = "Errore di rete, il server non risponde";
          $cli_out = "Errore di connessione:" . $ex . "\n\n";
          $esito = "Errore di connessione al server OCR. Elaborazione non riuscita.";
          echo $cli_out;
          $logger->logCLIWorks($cli_out, $logcli_file);
          if ($mail) {
            $mailer->inviaMail($oggetto,$titolo, $esito, $testmail);
          }
          return ExitCode::NOHOST;
        }
        }
    }