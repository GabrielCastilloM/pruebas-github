<?php

namespace app\models;

use Yii;
use app\models\TipoMascota;
use app\models\RazaMascota;

/**
 * This is the model class for table "mascota".
 *
 * @property int $mas_id
 * @property int|null $tip_mas_id
 * @property string|null $mas_nombre
 * @property string|null $mas_raza
 *
 * @property TipoMascota $tipMas
 * @property Vacuna[] $vacunas
 */
class Mascota extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mascota';
    }

    public $mas_tipo_id;
 
    public $raz_mas_id;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tip_mas_id'], 'integer'],
            [['mas_nombre', 'mas_raza'], 'string', 'max' => 45],
            [['tip_mas_id'], 'exist', 'skipOnError' => true, 'targetClass' => TipoMascota::className(), 'targetAttribute' => ['tip_mas_id' => 'tip_mas_id']],
            [['tip_mas_id','raz_mas_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'mas_id' => 'Mas ID',
            'tip_mas_id' => 'Tip Mas ID',
            'mas_nombre' => 'Mas Nombre',
            'mas_raza' => 'Mas Raza',
        ];
    }

    /**
     * Gets query for [[TipMas]].
     *
     * @return \yii\db\ActiveQuery
     */
   

    public function getRazMas()
    {
        return $this->hasOne(RazaMascota::className(), ['raz_mas_id' => 'raz_mas_id']);
    }

    public function getTipMas()
    {
        return $this->hasOne(TipoMascota::className(), ['tip_mas_id' => 'tip_mas_id']);
    }

        

    /**
     * Gets query for [[Vacunas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVacunas()
    {
        return $this->hasMany(Vacuna::className(), ['masc_id' => 'mas_id']);
    }

    


             
}
