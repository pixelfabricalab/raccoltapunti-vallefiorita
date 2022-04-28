<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "scontrino_data".
 *
 * @property int $id
 * @property int|null $id_scontrino
 * @property string|null $rfscontrino
 * @property string|null $numerodocumento
 * @property string|null $dataemissione
 * @property string|null $ragionesociale
 * @property string|null $indirizzo
 * @property string|null $provincia
 * @property string|null $citta
 * @property string|null $cap
 * @property string|null $telefono
 * @property string|null $piva
 * @property int|null $pivaisvalid
 * @property int|null $pivaisvies
 * @property int|null $dati_validi
 */
class ScontrinoData extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'scontrino_data';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_scontrino', 'pivaisvalid', 'pivaisvies', 'dati_validi'], 'integer'],
            [['dataemissione'], 'safe'],
            [['rfscontrino', 'numerodocumento', 'ragionesociale', 'indirizzo', 'provincia', 'citta', 'cap', 'telefono', 'piva'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_scontrino' => 'Id Scontrino',
            'rfscontrino' => 'Rfscontrino',
            'numerodocumento' => 'Numerodocumento',
            'dataemissione' => 'Dataemissione',
            'ragionesociale' => 'Ragionesociale',
            'indirizzo' => 'Indirizzo',
            'provincia' => 'Provincia',
            'citta' => 'Citta',
            'cap' => 'Cap',
            'telefono' => 'Telefono',
            'piva' => 'Piva',
            'pivaisvalid' => 'Pivaisvalid',
            'pivaisvies' => 'Pivaisvies',
            'dati_validi' => 'Dati Validi',
        ];
    }

    public function getId() {
        $id = $this->id;
        return $id;
    }
}