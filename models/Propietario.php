<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "propietario".
 *
 * @property int $id
 * @property string $name
 */
class Propietario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'propietario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 200],
            [['name'], 'string'],
            //[['student_image'], 'required'],
            [['student_image'], 'file','skipOnEmpty'=>TRUE,'extensions'=>'jpg, png']
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
}
