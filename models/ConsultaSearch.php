<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Consulta;

/**
 * ConsultaSearch represents the model behind the search form of `app\models\Consulta`.
 */
class ConsultaSearch extends Consulta
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'estado'], 'integer'],
            [['diagnosticotext', 'diagnosticomediun', 'foto'], 'safe'],
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
        $query = Consulta::find();

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
            'estado' => $this->estado,
        ]);

        $query->andFilterWhere(['like', 'diagnosticotext', $this->diagnosticotext])
            ->andFilterWhere(['like', 'diagnosticomediun', $this->diagnosticomediun])
            ->andFilterWhere(['like', 'foto', $this->foto]);

        return $dataProvider;
    }
}
