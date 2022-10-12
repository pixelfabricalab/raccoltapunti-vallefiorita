<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "puntovendita".
 *
 * @property int $id
 * @property string|null $codice
 * @property string|null $ragione_sociale
 * @property string|null $descrizione
 * @property string|null $partita_iva
 * @property string|null $codice_fiscale
 * @property string|null $indirizzo
 * @property string|null $cap
 * @property string|null $citta
 * @property string|null $insegna
 * @property string|null $creato_il
 * @property string|null $modificato_il
 */
class Puntovendita extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'puntovendita';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descrizione'], 'string'],
            [['ragione_sociale'], 'required'],
            [['creato_il', 'modificato_il'], 'safe'],
            [['codice', 'ragione_sociale', 'partita_iva', 'codice_fiscale', 'indirizzo', 'cap', 'citta', 'insegna'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'codice' => 'Codice',
            'ragione_sociale' => 'Ragione Sociale',
            'descrizione' => 'Descrizione',
            'partita_iva' => 'Partita Iva',
            'codice_fiscale' => 'Codice Fiscale',
            'indirizzo' => 'Indirizzo',
            'cap' => 'Cap',
            'citta' => 'Citta',
            'insegna' => 'Insegna',
            'creato_il' => 'Creato Il',
            'modificato_il' => 'Modificato Il',
        ];
    }
}
