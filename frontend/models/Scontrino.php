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
}
