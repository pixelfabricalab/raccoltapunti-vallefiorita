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
    public $username;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'eta', 'b2b'], 'integer'],
            [['nome', 'cognome', 'data_nascita', 'professione', 'residenza_indirizzo', 'residenza_citta', 'comune', 'cap',
                'residenza_cap', 'residenza_provincia', 'cellulare', 'ragione_sociale', 'partita_iva', 'username'], 'safe'],
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
        $query->joinWith(['user']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['username'] = [
            // The tables are the ones our relation are configured to
            // in my case they are prefixed with "tbl_"
            'asc' => ['user.username' => SORT_ASC],
            'desc' => ['user.username' => SORT_DESC],
        ];

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
            ->andFilterWhere(['like', 'cellulare', $this->cellulare])
            ->andFilterWhere(['like', 'ragione_sociale', $this->ragione_sociale])
            ->andFilterWhere(['like', 'partita_iva', $this->partita_iva])
            ->andFilterWhere(['like', 'user.username', $this->username])
            ->andFilterWhere(['like', 'comune', $this->comune])
            ->andFilterWhere(['like', 'cap', $this->cap])
        ;

        return $dataProvider;
    }
}
