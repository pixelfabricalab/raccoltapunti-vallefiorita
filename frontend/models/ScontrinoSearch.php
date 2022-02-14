<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Scontrino;

/**
 * ScontrinoSearch represents the model behind the search form of `frontend\models\Scontrino`.
 */
class ScontrinoSearch extends Scontrino
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'proprietario_id'], 'integer'],
            [['nomefile', 'hashnomefile', 'estensionefile', 'dimensionefile', 'datacattura', 'rfscontrino', 'piva', 'ragionesociale', 'dataemissione', 'numerodocumento'], 'safe'],
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
            'proprietario_id' => $this->proprietario_id,
        ]);

        $query->andFilterWhere(['like', 'nomefile', $this->nomefile])
            ->andFilterWhere(['like', 'hashnomefile', $this->hashnomefile])
            ->andFilterWhere(['like', 'estensionefile', $this->estensionefile])
            ->andFilterWhere(['like', 'dimensionefile', $this->dimensionefile])
            ->andFilterWhere(['like', 'datacattura', $this->datacattura])
            ->andFilterWhere(['like', 'rfscontrino', $this->rfscontrino])
            ->andFilterWhere(['like', 'piva', $this->piva])
            ->andFilterWhere(['like', 'ragionesociale', $this->ragionesociale])
            ->andFilterWhere(['like', 'dataemissione', $this->dataemissione])
            ->andFilterWhere(['like', 'numerodocumento', $this->numerodocumento]);

        return $dataProvider;
    }
}
