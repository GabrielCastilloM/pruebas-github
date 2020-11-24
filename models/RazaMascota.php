<?php

namespace app\models;

use Yii;
use app\models\mascota;

/**
 * This is the model class for table "raza_mascota".
 *
 * @property int $raz_mas_id
 * @property int|null $tip_mas_id
 * @property string|null $raz_mas_descripcion
 *
 * @property TipoMascota $tipMas
 */
class RazaMascota extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'raza_mascota';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tip_mas_id'], 'integer'],
            [['raz_mas_descripcion'], 'string', 'max' => 45],
            [['tip_mas_id'], 'exist', 'skipOnError' => true, 'targetClass' => TipoMascota::className(), 'targetAttribute' => ['tip_mas_id' => 'tip_mas_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'raz_mas_id' => 'Raz Mas ID',
            'tip_mas_id' => 'Tip Mas ID',
            'raz_mas_descripcion' => 'Raz Mas Descripcion',
        ];
    }

    /**
     * Gets query for [[TipMas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTipMas()
    {
        return $this->hasOne(TipoMascota::className(), ['tip_mas_id' => 'tip_mas_id']);
    }

    public function getMascotas()
    {
        return $this->hasMany(Mascota::className(), ['raz_mas_id' => 'mas_id']);
    }
}
