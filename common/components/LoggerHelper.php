<?php
    namespace common\components;

    use Yii;
    use common\components\Request;

    class LoggerHelper {
        public function logUpload($content) {
            $request = new Request;
            $url = $request->getBaseUrl();
            $logfile = fopen("{$url}/frontend/web/logs/_uploads.txt", "a") or die("Unable to open file!");
            fwrite($logfile, $content);
            fclose($logfile);
            return true;
        }

        public function logOCROutput($output) {
            $request = new Request;
            $url = $request->getBaseUrl();
            $logfile = fopen("{$url}/frontend/web/logs/_ocroutput.txt", "a") or die("Unable to open file!");
            fwrite($logfile, $output);
            fclose($logfile);
            return true;
        }

        public function logBatchOCROutput($output, $filename) {
            $request = new Request;
            $url = $request->getBaseUrl();
            $logfile = fopen("{$url}/frontend/web/logs/{$filename}", "a") or die("Unable to open file!");
            fwrite($logfile, $output);
            fclose($logfile);
            return true;
        }

        public function logCLIWorks($output, $filename) {
            $request = new Request;
            $url = $request->getBaseUrl();
            $logfile = fopen("{$url}/frontend/web/logs/{$filename}", "a") or die("Unable to open file!");
            fwrite($logfile, $output);
            fclose($logfile);
            return true;
        }
    }