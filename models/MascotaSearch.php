<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Mascota;

/**
 * MascotaSearch represents the model behind the search form of `app\models\Mascota`.
 */
class MascotaSearch extends Mascota
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mas_id', 'tip_mas_id'], 'integer'],
            [['mas_nombre', 'mas_raza'], 'safe'],
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
        $query = Mascota::find();

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
            'mas_id' => $this->mas_id,
            'tip_mas_id' => $this->tip_mas_id,
        ]);

        $query->andFilterWhere(['like', 'mas_nombre', $this->mas_nombre])
            ->andFilterWhere(['like', 'mas_raza', $this->mas_raza]);

        return $dataProvider;
    }
}
