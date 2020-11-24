<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vacuna".
 *
 * @property int $vac_id
 * @property int|null $masc_id
 * @property string|null $vac_descripcion
 *
 * @property Mascota $masc
 */
class Vacuna extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vacuna';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['masc_id'], 'integer'],
            [['vac_descripcion'], 'string', 'max' => 45],
            [['masc_id'], 'exist', 'skipOnError' => true, 'targetClass' => Mascota::className(), 'targetAttribute' => ['masc_id' => 'mas_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'vac_id' => 'Vac ID',
            'masc_id' => 'Masc ID',
            'vac_descripcion' => 'Vac Descripcion',
        ];
    }

    /**
     * Gets query for [[Masc]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMasc()
    {
        return $this->hasOne(Mascota::className(), ['mas_id' => 'masc_id']);
    }
}
