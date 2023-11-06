<?php

namespace common\models;

use Yii;
use common\models\Scontrino;
use common\models\Coupon;

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

    const B2B_NO = 0;
    const B2B_SI = 1;
    const B2B_ATTIVO = 2;
    const B2B_RIFIUTATO = -1;

    const SCONTO_PERCENTUALE = 'percentuale';
    const SCONTO_IMPORTO = 'importo';

    public $password;

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
            [['nome', 'cognome', 'email'], 'required'],
            [['partita_iva', 'ragione_sociale'], 'required','when' => function($model) {
                return (int)$model->b2b != 0;
            }, 'whenClient' => "function (attribute, value) {
                return $('#profilo-b2b').val() != '0';
            }"],
            [['password'], 'required','when' => function($model) {
                return is_null($model->id);
            }],
            [['partita_iva'], 'unique'],
            [['partita_iva'], 'string', 'length' => 11],
            [['data_nascita', 'user_id', 'bio', 'ragione_sociale', 'comune', 'indirizzo', 'cap', 'provincia', 'cellulare', 'email', 'password'], 'safe'],
            [['eta', 'b2b', 'valore_sconto'], 'integer'],
            [['tipo_sconto'], 'string', 'max' => 16],
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
    public function getScontrini()
    {
        return $this->hasMany(Scontrino::class, ['profilo_id' => 'id']);
    }

    public function getNumScontrini()
    {
        return $this->getScontrini()->count();
    }

    public function getNumCoupon()
    {
        return $this->getCoupon()->count();
    }

    public function getTotaleScontrini()
    {
        $somma = 0;
        foreach ($this->scontrini as $s) {
            $somma += (float)$s->totale;
        }

        return $somma;
    }

    public function getValoreMedioScontrini()
    {
        $numScontrini = $this->numScontrini;

        if ($numScontrini == 0) {
            return \Yii::$app->formatter->asCurrency(0);
        }

        return \Yii::$app->formatter->asCurrency(round($this->totaleScontrini / $numScontrini, 2));
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCoupon()
    {
        return $this->hasMany(Coupon::class, ['profile_id' => 'id']);
    }

    public function getUser()
    {
        return $this->hasOne(\common\models\User::class, ['id' => 'user_id']);
    }

    public function getCognomeNome()
    {
        return $this->cognome . ' ' . $this->nome;
    }

    public function getCognomeNomeEmail()
    {
        return $this->cognome . ' ' . $this->nome . ' (' . $this->user->username . ')';
    }

    public function afterFind()
    {
        if ($this->user) {
            $this->email = $this->user->username;
        }
        parent::afterFind();
    }

}
