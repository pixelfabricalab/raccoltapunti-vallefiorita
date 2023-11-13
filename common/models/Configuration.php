<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "configuration".
 *
 * @property int $id
 * @property string $cfg_key
 * @property string|null $cfg_val
 */
class Configuration extends \yii\db\ActiveRecord
{
    public $valore;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'configuration';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cfg_key'], 'required'],
            [['cfg_key', 'cfg_val'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cfg_key' => 'Chiave',
            'cfg_val' => 'Valore',
        ];
    }

    public static function get($key, $default = null)
    {
        $result = self::findOne(['cfg_key' => $key]);
        if ($result) {
            return $result->cfg_val;
        } else {
            return $default;
        }
    }
}
