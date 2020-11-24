<?php

namespace app\models;

use Yii;
use app\models\mascota;

/**
 * This is the model class for table "tipo_mascota".
 *
 * @property int $tip_mas_id
 * @property string|null $tip_mas_descripcion
 *
 * @property Mascota[] $mascotas
 */
class TipoMascota extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipo_mascota';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tip_mas_descripcion'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tip_mas_id' => 'Tip Mas ID',
            'tip_mas_descripcion' => 'Tip Mas Descripcion',
        ];
    }

    /**
     * Gets query for [[Mascotas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMascotas()
    {
        return $this->hasMany(Mascota::className(), ['tip_mas_id' => 'mas_id']);
    }

}
