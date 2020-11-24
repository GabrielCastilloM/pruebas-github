<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RazaMascota;

/**
 * RazaMascotaSearch represents the model behind the search form of `app\models\RazaMascota`.
 */
class RazaMascotaSearch extends RazaMascota
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['raz_mas_id', 'tip_mas_id'], 'integer'],
            [['raz_mas_descripcion'], 'safe'],
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
        $query = RazaMascota::find();

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
            'raz_mas_id' => $this->raz_mas_id,
            'tip_mas_id' => $this->tip_mas_id,
        ]);

        $query->andFilterWhere(['like', 'raz_mas_descripcion', $this->raz_mas_descripcion]);

        return $dataProvider;
    }
}
