<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_blog".
 *
 * @property int $id
 * @property int $id_kategori
 * @property string|null $tanggal
 * @property string|null $judul
 * @property string|null $gambar
 */
class TbBlog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_blog';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_kategori'], 'required'],
            [['id_kategori'], 'integer'],
            [['tanggal'], 'safe'],
            [['judul'], 'string', 'max' => 50],
            [['gambar'], 'file','skipOnEmpty'=>TRUE,'extensions'=>'jpg, png']
        ];
    }

   
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_kategori' => 'Id Kategori',
            'tanggal' => 'Tanggal',
            'judul' => 'Judul',
            'gambar' => 'Gambar',
        ];
    }
}
