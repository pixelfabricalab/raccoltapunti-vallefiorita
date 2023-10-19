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
        $this->creato_il = date('Y-m-d H:i:s');
        return parent::loadDefaultValues($skipIfSet);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['codice'], 'required'],
            [['data_utilizzo', 'creato_il', 'modificato_il'], 'safe'],
            [['status', 'sconto_percentuale', 'profile_id', 'puntovendita_id'], 'integer'],
            [['sconto_importo'], 'number'],
            [['profile_id'], 'required'],
            [['codice'], 'string', 'max' => 255],
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
        $qrcode = \Yii::$app->qr->render($this->codice);
        return $qrcode;
    }
}
