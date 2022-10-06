<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "premio".
 *
 * @property int $id
 * @property string|null $codice
 * @property string|null $titolo
 * @property string|null $descrizione
 * @property int|null $valore
 * @property string|null $image
 */
class Premio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'premio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descrizione'], 'string'],
            [['valore'], 'integer'],
            [['codice', 'titolo', 'image'], 'string', 'max' => 255],
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
            'valore' => 'Valore',
            'image' => 'Image',
        ];
    }
}
