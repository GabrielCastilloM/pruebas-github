<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ConsultaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Consultas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="consulta-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Consulta', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'diagnosticotext:ntext',
            'diagnosticomediun:ntext',
            'foto',

            /*[
                'class' => 'yii\grid\DataColumn',
                'header' => 'Foto',
                'format' => 'raw',
                'value' => function($data){
                    return "<img width='104px' src='".Url::to(['blog/view-gambar','nama'=>$data->foto])."'>";
                }
            ],**/

            'estado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>



</div>
