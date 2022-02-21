<?php

namespace frontend\models;

use Yii;
use yii\web\UploadedFile;
use frontend\components\AnalisiScontrino;


/**
 * This is the model class for table "scontrino".
 *
 * @property int $id
 * @property string|null $nomefile
 * @property string|null $hashnomefile
 * @property string|null $estensionefile
 * @property string|null $dimensionefile
 * @property int|null $proprietario_id
 * @property string|null $datacattura
 * @property string|null $rfscontrino
 * @property string|null $piva
 * @property string|null $ragionesociale
 * @property string|null $dataemissione
 * @property string|null $numerodocumento
 */
class Scontrino extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'scontrino';
    }

    /**
     * @var UploadedFile
     */
    public $imageFile;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['proprietario_id'], 'integer'],
            [['nomefile', 'hashnomefile', 'estensionefile', 'dimensionefile', 'datacattura', 'rfscontrino', 'piva', 'ragionesociale', 'dataemissione', 'numerodocumento'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nomefile' => 'Nomefile',
            'hashnomefile' => 'Hashnomefile',
            'estensionefile' => 'Estensionefile',
            'dimensionefile' => 'Dimensionefile',
            'proprietario_id' => 'Proprietario ID',
            'datacattura' => 'Datacattura',
            'rfscontrino' => 'Rfscontrino',
            'piva' => 'Piva',
            'ragionesociale' => 'Ragionesociale',
            'dataemissione' => 'Dataemissione',
            'numerodocumento' => 'Numerodocumento',
        ];
    }
    
    /* funzione che esegue l'upload del file */
    public function upload() {
        $base = Yii::getAlias('@webroot') . '/uploads/scontrini/';
        if ($this->validate()) {
            $this->imageFile->saveAs($base . hash('sha256', $this->imageFile->baseName . time()) . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }
    
    /* funzione che lancia l'OCR in maniera sincrona - ritorna un array di stringhe */
    public function scansionaFile($imagefile) {
        // inizializza curl
        $curl = curl_init();
        // setta le opzioni per curl, la richiesta viene fatta con una POST su un form -- CURLOPT_POSTFIELDS - generata con Postman
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://89.148.181.23:9090/analizza',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('image'=> new \CURLFILE($imagefile),'modo' => '3','engine' => '3'),
        ));
        // ottiene la risposta eseguendo curl
        $response = curl_exec($curl);
        // chiude la sessione curl
        curl_close($curl);
        // esegue l'encoding della response (utile per lettere accentate e terminatori di riga)
        $encoded_response = utf8_encode($response);
        //esplode la response basandosi su ogni EOL presente - primo parsing
        $righe_scontrino = $this->esplodiRighe($encoded_response, PHP_EOL);
        $righe_scontrino = $this->analizzaContenutoScontrino($righe_scontrino);
        return $righe_scontrino;
    }
    
    /* funzione che ritorna un array con tutte le righe esplose */
    public function esplodiRighe($response, $terminatore) {
        $righe = explode($terminatore, $response);
        return $righe;
    }

    /* check della validità dei campi e dei testi presenti nello scontrino post-response da Tesseract */
    public function analizzaContenutoScontrino($righe_scontrino) {
        //inizializzo un array dove catalogherò tutte le informazioni sicuramente OK
        $info_scontrino = [];
        //inizializzo componente per la validazione dello scontrino
        $analisiscontrino = new AnalisiScontrino;
        // rimuovi primo elemento dell'array -- che è sicuramente RIS:...
        unset($righe_scontrino[0]);
        // rimuove le righe vuote dall'array
        $righe_scontrino = array_filter($righe_scontrino);
        // da verificare, non so come. Si presuppone che il primo elemento dell'array dopo la rimozione dell'elemento 0 sia il nome dell'attività commerciale
        $nomenegozio = $righe_scontrino[1];
        // ricerca della partita IVA
        // https://stackoverflow.com/questions/6228581/how-to-search-array-of-string-in-another-string-in-php
        // https://stackoverflow.com/questions/18338915/check-array-for-partial-match-php
        $piva_nonparsata = preg_grep("/P.IVA/", $righe_scontrino);

        //parsing della riga che contiene *presumibilmente* la partita IVA
        $piva = explode(':', $piva_nonparsata[4]);
        $piva = explode(' ', $piva[1]);
        var_dump($piva);
        $ris = $analisiscontrino->validaVIES('IT', '03117590756');
        var_dump($ris);
        return $righe_scontrino;
    }
}
