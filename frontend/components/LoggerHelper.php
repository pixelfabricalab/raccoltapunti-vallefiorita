<?php
    namespace frontend\components;

    use Yii;

    class LoggerHelper {
        public function logUpload($content) {
            $logfile = fopen("./uploads/scontrini/uploads.log", "w+") or die("Unable to open file!");
            fwrite($myfile, $content);
            fclose($myfile);
            return true;
        }

        public function logOCROutput($output) {
            $logocr = fopen("./uploads/scontrini/ocroutput.log", "w+") or die("Unable to open file!");
            fwrite($logocr, $output);
            fclose($logocr);
            return true;
        }
    }