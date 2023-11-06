<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Profilo;

/**
 * ProfiloSearch represents the model behind the search form of `common\models\Profilo`.
 */
class ProfiloSearch extends Profilo
{
    public $business = false;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'eta', 'b2b'], 'integer'],
            [['nome', 'cognome', 'data_nascita', 'professione', 'residenza_indirizzo', 'residenza_citta', 'residenza_cap', 'residenza_provincia', 'cellulare'], 'safe'],
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
        $query = Profilo::find();

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
            'data_nascita' => $this->data_nascita,
            'eta' => $this->eta,
        ]);

        if (!$this->business) {
            $query->andFilterWhere(['=', 'b2b', (int)$this->b2b]);
        } else {
            $query->andFilterWhere(['in', 'b2b', [1, 2, -1]]);
        }

        $query->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'cognome', $this->cognome])
            ->andFilterWhere(['like', 'professione', $this->professione])
            ->andFilterWhere(['like', 'residenza_indirizzo', $this->residenza_indirizzo])
            ->andFilterWhere(['like', 'residenza_citta', $this->residenza_citta])
            ->andFilterWhere(['like', 'residenza_cap', $this->residenza_cap])
            ->andFilterWhere(['like', 'residenza_provincia', $this->residenza_provincia])
            ->andFilterWhere(['like', 'cellulare', $this->cellulare]);

        return $dataProvider;
    }
}
