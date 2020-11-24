<?php

namespace app\models;

use Yii;
use app\models\User;

/**
 * This is the model class for table "city".
 *
 * @property int $id
 * @property int $country_id
 * @property string $name
 *
 * @property Country $country
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['country_id', 'name'], 'required'],
            [['country_id'], 'integer'],
            [['name'], 'string', 'max' => 11],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => Country::className(), 'targetAttribute' => ['country_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'country_id' => 'Country ID',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[Country]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['id' => 'country_id']);
    }

    public function getUsers()
    {
    return $this->hasMany(User::className(), ['city_id' => 'id']);
    }
}
