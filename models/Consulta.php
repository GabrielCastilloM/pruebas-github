<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "consulta".
 *
 * @property int $id
 * @property string $diagnosticotext
 * @property string|null $diagnosticomediun
 * @property string $foto
 * @property int $estado
 */
class Consulta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'consulta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['diagnosticotext', 'foto', 'estado'], 'required'],
            [['diagnosticotext', 'diagnosticomediun'], 'string'],
            [['diagnosticotext'], 'unique'],
            [['estado'], 'integer'],
            [['foto'],'required','on' => 'create'],
            [['foto'], 'file','skipOnEmpty'=>TRUE,'extensions'=>'jpg, png']
        ];
    }
   
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'diagnosticotext' => 'Diagnosticotext',
            'diagnosticomediun' => 'Diagnosticomediun',
            'foto' => 'Foto',
            'estado' => 'Estado',
        ];
    }
}
