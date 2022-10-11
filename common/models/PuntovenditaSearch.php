<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Puntovendita;

/**
 * PuntovenditaSearch represents the model behind the search form of `common\models\Puntovendita`.
 */
class PuntovenditaSearch extends Puntovendita
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['codice', 'ragione_sociale', 'descrizione', 'partita_iva', 'codice_fiscale', 'indirizzo', 'cap', 'citta', 'insegna', 'creato_il', 'modificato_il'], 'safe'],
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
        $query = Puntovendita::find();

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
            'creato_il' => $this->creato_il,
            'modificato_il' => $this->modificato_il,
        ]);

        $query->andFilterWhere(['like', 'codice', $this->codice])
            ->andFilterWhere(['like', 'ragione_sociale', $this->ragione_sociale])
            ->andFilterWhere(['like', 'descrizione', $this->descrizione])
            ->andFilterWhere(['like', 'partita_iva', $this->partita_iva])
            ->andFilterWhere(['like', 'codice_fiscale', $this->codice_fiscale])
            ->andFilterWhere(['like', 'indirizzo', $this->indirizzo])
            ->andFilterWhere(['like', 'cap', $this->cap])
            ->andFilterWhere(['like', 'citta', $this->citta])
            ->andFilterWhere(['like', 'insegna', $this->insegna]);

        return $dataProvider;
    }
}
