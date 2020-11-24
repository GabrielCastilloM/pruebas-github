<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TipoMascota;

/**
 * TipoMascotaSearch represents the model behind the search form of `app\models\TipoMascota`.
 */
class TipoMascotaSearch extends TipoMascota
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tip_mas_id'], 'integer'],
            [['tip_mas_descripcion'], 'safe'],
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
        $query = TipoMascota::find();

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
            'tip_mas_id' => $this->tip_mas_id,
        ]);

        $query->andFilterWhere(['like', 'tip_mas_descripcion', $this->tip_mas_descripcion]);

        return $dataProvider;
    }
}
