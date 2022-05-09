<?php
    namespace frontend\components;

    use Yii;

    class LoggerHelper {
        public function logUpload($content) {
            //$base = Yii::getAlias('@webroot') . '/uploads/scontrini/';
            $logfile = fopen("./uploads/scontrini/uploads.log", "a") or die("Unable to open file!");
            fwrite($logfile, $content);
            fclose($logfile);
            return true;
        }

        public function logOCROutput($output) {
            $logfile = fopen("./uploads/scontrini/ocroutput.log", "w+") or die("Unable to open file!");
            fwrite($logfile, $output);
            fclose($logfile);
            return true;
        }
    }