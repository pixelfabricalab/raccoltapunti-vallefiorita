<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "scontrino".
 *
 * @property int $id
 * @property string|null $nomefile
 * @property string|null $hashnomefile
 * @property string|null $estensionefile
 * @property string|null $data_caricamento
 * @property int|null $id_proprietario
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
            [['id_proprietario'], 'integer'],
            [['nomefile', 'hashnomefile', 'estensionefile'], 'string', 'max' => 255],
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
            'data_caricamento' => 'Data Caricamento',
            'id_proprietario' => 'Id Proprietario',
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
}