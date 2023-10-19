<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "profilo".
 *
 * @property int $id
 * @property string|null $nome
 * @property string|null $cognome
 * @property string|null $data_nascita
 * @property string|null $professione
 * @property int|null $eta
 * @property string|null $residenza_indirizzo
 * @property string|null $residenza_citta
 * @property string|null $residenza_cap
 * @property string|null $residenza_provincia
 * @property string|null $cellulare
 *
 * @property User[] $users
 */
class Profilo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profilo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['data_nascita', 'user_id', 'bio'], 'safe'],
            [['eta'], 'integer'],
            [['nome', 'cognome', 'professione', 'residenza_indirizzo', 'residenza_citta', 'residenza_cap', 'residenza_provincia', 'cellulare'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'cognome' => 'Cognome',
            'data_nascita' => 'Data Nascita',
            'professione' => 'Professione',
            'eta' => 'Eta',
            'residenza_indirizzo' => 'Indirizzo',
            'residenza_citta' => 'Citta',
            'residenza_cap' => 'Cap',
            'residenza_provincia' => 'Provincia',
            'cellulare' => 'Cellulare',
        ];
    }

    public function getNomeCompleto($inverse=false)
    {
        return $this->nome . ' ' . $this->cognome;
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['profilo_id' => 'id']);
    }
}
