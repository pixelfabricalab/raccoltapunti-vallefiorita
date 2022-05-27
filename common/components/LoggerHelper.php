<?php
    namespace common\components;

    use Yii;
    use common\components\Request;

    class LoggerHelper {
        public function logUpload($content) {
            //$base = Yii::getAlias('@webroot') . '/uploads/scontrini/';
            $request = new Request;
            $url = $request->getBaseUrl();
            $logfile = fopen("{$url}/uploads/scontrini/_uploads.log", "a") or die("Unable to open file!");
            fwrite($logfile, $content);
            fclose($logfile);
            return true;
        }

        public function logOCROutput($output) {
            $request = new Request;
            $url = $request->getBaseUrl();
            $logfile = fopen("{$url}/uploads/scontrini/_ocroutput.log", "a") or die("Unable to open file!");
            fwrite($logfile, $output);
            fclose($logfile);
            return true;
        }

        public function logBatchOCROutput($output) {
            $request = new Request;
            $url = $request->getBaseUrl();
            $logfile = fopen("{$url}/frontend/web/uploads/scontrini/_batchocroutput.log", "a") or die("Unable to open file!");
            fwrite($logfile, $output);
            fclose($logfile);
            return true;
        }
    }