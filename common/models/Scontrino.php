<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;
use common\components\LoggerHelper;

/**
 * This is the model class for table "scontrino".
 *
 * @property int $id
 * @property string|null $nomefile
 * @property string|null $hashnomefile
 * @property string|null $estensionefile
 * @property string|null $data_caricamento
 * @property string|null $mimetype
 * @property string|null $tmpfilename
 * @property int|null $id_proprietario
 * @property int|null $dimensione
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
            [['data_caricamento'], 'safe'],
            [['id_proprietario', 'dimensione', 'is_elapsed'], 'integer'],
            [['nomefile', 'hashnomefile', 'estensionefile', 'mimetype', 'tmpfilename', 'ragione_sociale'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nomefile' => 'File',
            'hashnomefile' => 'Hashnomefile',
            'estensionefile' => 'Estensionefile',
            'dimensione' => 'Dimensione',
            'data_caricamento' => 'Data Caricamento',
            'id_proprietario' => 'Id Proprietario',
            'mimetype' => 'Tipo File',
            'tmpfilename' => 'Nome temporaneo file',
            'ragione_sociale' => 'Ragione sociale',
            'is_elapsed' => 'Elaborato',
        ];
    }

    /* funzione che esegue l'upload del file */
    public function upload() {
        $logger = new LoggerHelper;
        $base = Yii::getAlias('@webroot') . '/uploads/scontrini/';
        if ($this->validate()) {
            $fileparams = [];
            $filename = $this->imageFile->baseName;
            $mimetype = $this->imageFile->type;
            $size = $this->imageFile->size;
            $extension = $this->imageFile->extension;
            $tmpfilename = $this->imageFile->tempName;
            $upload_date = date('d-m-Y H:i:s');
            $hashfilename = hash('sha256', $filename . time());
            $this->imageFile->saveAs($base . $hashfilename . '.' . $extension);
            $fileparams = ['filename' => $filename, 'tempName' => $tmpfilename, 'mimetype' => $mimetype, 'size' => $size, 'extension' => $extension, 'hashfilename' => $hashfilename];
            $logcontent = "Upload \n ============== \n\n nomefile: ". $filename. "\n nometemporaneo: ". $tmpfilename ."\n tipo file: ". $mimetype . "\n dimensione: " . $size . "\n estensione: " . $extension . "\n hashnomefile: ". $hashfilename . "\n data upload: ". $upload_date ."\n\n =================\n";
            $logger->logUpload($logcontent);
            return $fileparams;
        } else {
            $logcontent = 'Upload fallito\n\n';
            $logger->logUpload($logcontent);
            return false;
        }
    }
}