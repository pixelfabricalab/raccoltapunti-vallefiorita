<?php

namespace frontend\models;

use Yii;
use yii\web\UploadedFile;


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
    
    /* funzione che lancia l'OCR in maniera sincrona */
    public function scansionaFile($imagefile) {
        $curl = curl_init();
      
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
      
      $response = curl_exec($curl);
      
      curl_close($curl);
        return utf8_encode($response);
      }
    
    /* funzione che ritorna un array con tutte le righe esplose */
    public function esplodiRighe($response, $terminatore) {
        $righe = explode($terminatore, $response);
        return $righe;
    }
}
