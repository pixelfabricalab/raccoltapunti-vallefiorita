<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "coupon".
 *
 * @property int $id
 * @property string|null $codice
 * @property string|null $data_utilizzo
 * @property int|null $status
 * @property float|null $sconto_importo
 * @property int|null $sconto_percentuale
 * @property string|null $creato_il
 * @property string|null $modificato_il
 * @property int $profile_id
 * @property int|null $puntovendita_id
 *
 * @property User $profile
 * @property Puntovendita $puntovendita
 */
class Coupon extends \yii\db\ActiveRecord
{
    const SCONTO_PERCENTUALE = 'percentuale';
    const SCONTO_IMPORTO = 'importo';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'coupon';
    }

    /**
     * {@inheritdoc}
     */
    public function loadDefaultValues($skipIfSet = true)
    {
        $this->codice = $key = \Yii::$app->getSecurity()->generateRandomString();
        $this->status = 1;
        $this->creato_il = date('Y-m-d H:i:s');
        $this->modificato_il = date('Y-m-d H:i:s');
        $this->sconto_percentuale = 20;
        $this->profile_id = \Yii::$app->user->identity->profilo->id;
        return parent::loadDefaultValues($skipIfSet);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['codice'], 'required'],
            [['data_utilizzo', 'creato_il', 'modificato_il', 'data_scadenza'], 'safe'],
            [['status', 'sconto_percentuale', 'profile_id', 'puntovendita_id'], 'integer'],
            [['sconto_importo'], 'number'],
            [['profile_id'], 'required'],
            [['codice', 'tipo_sconto'], 'string', 'max' => 255],
            [['profile_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['profile_id' => 'id']],
            [['puntovendita_id'], 'exist', 'skipOnError' => true, 'targetClass' => Puntovendita::class, 'targetAttribute' => ['puntovendita_id' => 'id']],
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
            'data_utilizzo' => 'Data Utilizzo',
            'status' => 'Status',
            'sconto_importo' => 'Sconto Importo',
            'sconto_percentuale' => 'Sconto Percentuale',
            'creato_il' => 'Creato Il',
            'modificato_il' => 'Modificato Il',
            'profile_id' => 'Profile ID',
            'puntovendita_id' => 'Puntovendita ID',
        ];
    }

    /**
     * Gets query for [[Profile]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProfile()
    {
        return $this->hasOne(User::class, ['id' => 'profile_id']);
    }

    /**
     * Gets query for [[Puntovendita]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPuntovendita()
    {
        return $this->hasOne(Puntovendita::class, ['id' => 'puntovendita_id']);
    }

    public function getQRCode()
    {
        $content = \yii\helpers\Url::to('@web/dashboard/coupon/validate?codice=' . $this->codice, true);
        $qrcode = \Yii::$app->qr->render($content);
        return $qrcode;
    }

    public function utilizza()
    {
        $this->status = 0;
        $this->data_utilizzo = date('Y-m-d H:i:s');
        $this->modificato_il = date('Y-m-d H:i:s');
    }

    public function getEtichettaValore()
    {
        if ($this->sconto_importo) {
            return \Yii::$app->formatter->asCurrency($this->sconto_importo);
        }
        if ($this->sconto_percentuale) {
            return $this->sconto_percentuale . ' %';
        }
        return 0;
    }
}
