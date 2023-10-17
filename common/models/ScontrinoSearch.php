<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Scontrino;

/**
 * ScontrinoSearch represents the model behind the search form of `common\models\Scontrino`.
 */
class ScontrinoSearch extends Scontrino
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'profilo_id'], 'integer'],
            [['content', 'creato_il', 'modificato_il'], 'safe'],
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
        $query = Scontrino::find();

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
            'profilo_id' => $this->profilo_id,
            'creato_il' => $this->creato_il,
            'modificato_il' => $this->modificato_il,
        ]);

        $query->andFilterWhere(['like', 'content', $this->content]);

        return $dataProvider;
    }
}
