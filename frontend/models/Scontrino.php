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
 * @property string|null $data_caricamento
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
            [['id_proprietario', 'dimensione'], 'integer'],
            [['nomefile', 'hashnomefile', 'estensionefile', 'mimetype', 'tmpfilename'], 'string', 'max' => 255],
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
            'dimensione' => 'Dimensione',
            'data_caricamento' => 'Data Caricamento',
            'id_proprietario' => 'Id Proprietario',
            'mimetype' => 'Tipo File',
            'tmpfilename' => 'Nome temporaneo file',
        ];
    }

    /* funzione che esegue l'upload del file */
    public function upload() {
        $base = Yii::getAlias('@webroot') . '/uploads/scontrini/';
        if ($this->validate()) {
            $fileparams = [];
            $filename = $this->imageFile->baseName;
            $mimetype = $this->imageFile->type;
            $size = $this->imageFile->size;
            $extension = $this->imageFile->extension;
            $tmpfilename = $this->imageFile->tempName;
            $hashfilename = hash('sha256', $this->imageFile->baseName . time());
            $this->imageFile->saveAs($base . $hashfilename . '.' . $extension);
            $fileparams = ['filename' => $filename, 'tempName' => $tmpfilename, 'mimetype' => $mimetype, 'size' => $size, 'extension' => $extension, 'hashfilename' => $hashfilename];
            return $fileparams;
        } else {
            return false;
        }
    }
}