<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "prodotti_scontrino_data".
 *
 * @property int $id
 * @property int|null $id_scontrino_data
 * @property string|null $nomeprodotto
 * @property string|null $prezzo_prodotto
 * @property string|null $tipo_prodotto
 * @property int|null $iva_prodotto
 * @property int|null $multiprodotto
 * @property int|null $conteggio_stesso_prodotto_per_riga
 * @property int|null $punti_per_prodotto
 * @property int|null $numeropunti
 */
class ProdottiScontrinoData extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prodotti_scontrino_data';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_scontrino_data', 'iva_prodotto', 'multiprodotto', 'conteggio_stesso_prodotto_per_riga', 'punti_per_prodotto', 'numeropunti'], 'integer'],
            [['nomeprodotto', 'prezzo_prodotto', 'tipo_prodotto'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_scontrino_data' => 'Id Scontrino Data',
            'nomeprodotto' => 'Nomeprodotto',
            'prezzo_prodotto' => 'Prezzo Prodotto',
            'tipo_prodotto' => 'Tipo Prodotto',
            'iva_prodotto' => 'Iva Prodotto',
            'multiprodotto' => 'Multiprodotto',
            'conteggio_stesso_prodotto_per_riga' => 'Conteggio Stesso Prodotto Per Riga',
            'punti_per_prodotto' => 'Punti Per Prodotto',
            'numeropunti' => 'Numeropunti',
        ];
    }
}