<?php

namespace app\models;

use Yii;
use app\models\User;

/**
 * This is the model class for table "country".
 *
 * @property int $id
 * @property string $name
 *
 * @property City[] $cities
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'country';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required', 'message' => 'este dato es requerido.'],           
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[Cities]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCities()
    {
        return $this->hasMany(City::className(), ['country_id' => 'id']);
    }

    public function getUsers()
    {
    return $this->hasMany(User::className(), ['country_id' => 'id']);
    }
}
