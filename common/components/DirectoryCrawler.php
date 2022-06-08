<?php 
    namespace common\components;
    use common\components\Request;

    class DirectoryCrawler {

        // funzione per contare il numero di file in una cartella.

        public function countFiles($directory) {
          // funzione per scansionare il numero di file nella cartella - agg.to - esclude . e .. dalla lista.
          $files = array_diff(scandir($directory), array('..', '.'));
          
          // conta gli elementi nella directory e li ritorna
          $numero_files = count($files);

          return $numero_files;
        }
    }