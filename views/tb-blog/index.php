<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TbBlogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tb Blogs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-blog-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tb Blog', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_kategori',
            'tanggal',
            'judul',
            //'gambar',

            [
                'class' => 'yii\grid\DataColumn',
                'header' => 'Gambar',
                'format' => 'raw',
                'value' => function($data){
                    return "<img width='104px' src='".Url::to(['pruebas/view-gambar','nama'=>$data->gambar])."'>";
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
