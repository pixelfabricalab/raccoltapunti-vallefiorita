<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "campagna".
 *
 * @property int $id
 * @property string|null $codice
 * @property string|null $titolo
 * @property string|null $descrizione
 * @property string|null $inizio
 * @property string|null $fine
 */
class Campagna extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'campagna';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descrizione'], 'string'],
            [['inizio', 'fine'], 'safe'],
            [['codice', 'titolo'], 'string', 'max' => 255],
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
            'titolo' => 'Titolo',
            'descrizione' => 'Descrizione',
            'inizio' => 'Inizio',
            'fine' => 'Fine',
        ];
    }
}
