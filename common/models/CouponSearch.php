<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Coupon;

/**
 * CouponSearch represents the model behind the search form of `common\models\Coupon`.
 */
class CouponSearch extends Coupon
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status', 'sconto_percentuale', 'profile_id', 'puntovendita_id'], 'integer'],
            [['codice', 'data_utilizzo', 'creato_il', 'modificato_il'], 'safe'],
            [['sconto_importo'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Coupon::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'data_utilizzo' => $this->data_utilizzo,
            'status' => $this->status,
            'sconto_importo' => $this->sconto_importo,
            'sconto_percentuale' => $this->sconto_percentuale,
            'creato_il' => $this->creato_il,
            'modificato_il' => $this->modificato_il,
            'profile_id' => $this->profile_id,
            'puntovendita_id' => $this->puntovendita_id,
        ]);

        $query->andFilterWhere(['like', 'codice', $this->codice]);

        return $dataProvider;
    }
}
