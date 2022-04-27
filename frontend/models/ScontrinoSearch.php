<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Scontrino;

/**
 * ScontrinoSearch represents the model behind the search form of `app\models\Scontrino`.
 */
class ScontrinoSearch extends Scontrino
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_proprietario'], 'integer'],
            [['nomefile', 'hashnomefile', 'estensionefile', 'data_caricamento'], 'safe'],
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
            'data_caricamento' => $this->data_caricamento,
            'id_proprietario' => $this->id_proprietario,
        ]);

        $query->andFilterWhere(['like', 'nomefile', $this->nomefile])
            ->andFilterWhere(['like', 'hashnomefile', $this->hashnomefile])
            ->andFilterWhere(['like', 'estensionefile', $this->estensionefile]);

        return $dataProvider;
    }
}