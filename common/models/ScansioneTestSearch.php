<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ScansioneTest;

/**
 * ScansioneTestSearch represents the model behind the search form of `common\models\ScansioneTest`.
 */
class ScansioneTestSearch extends ScansioneTest
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_scontrino', 'task', 'modo_scansione', 'engine_scansione', 'dpi_scansione', 'risoluzione', 'desk', 'has_valid_content', 'is_mail_sent', 'is_test'], 'integer'],
            [['nome_scontrino', 'dataora_scansione', 'piva', 'datascontrino', 'ndoc', 'lista_articoli', 'testo_rw'], 'safe'],
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
        $query = ScansioneTest::find();

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
            'id_scontrino' => $this->id_scontrino,
            'dataora_scansione' => $this->dataora_scansione,
            'task' => $this->task,
            'modo_scansione' => $this->modo_scansione,
            'engine_scansione' => $this->engine_scansione,
            'dpi_scansione' => $this->dpi_scansione,
            'risoluzione' => $this->risoluzione,
            'desk' => $this->desk,
            'has_valid_content' => $this->has_valid_content,
            'is_mail_sent' => $this->is_mail_sent,
            'is_test' => $this->is_test,
        ]);

        $query->andFilterWhere(['like', 'nome_scontrino', $this->nome_scontrino])
            ->andFilterWhere(['like', 'piva', $this->piva])
            ->andFilterWhere(['like', 'datascontrino', $this->datascontrino])
            ->andFilterWhere(['like', 'ndoc', $this->ndoc])
            ->andFilterWhere(['like', 'lista_articoli', $this->lista_articoli])
            ->andFilterWhere(['like', 'testo_rw', $this->testo_rw]);

        return $dataProvider;
    }
}
