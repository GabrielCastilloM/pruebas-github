<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\TipoMascota;
use app\models\TipoMascotaSearch;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RazaMascotaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Raza Mascotas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="raza-mascota-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Raza Mascota', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'raz_mas_id',
            'tip_mas_id',
            'raz_mas_descripcion',
            [
                'attribute' => 'tipo de mascota',
                'value' => function($model) {
                    $tipMascota = TipoMascota::findOne($model->tip_mas_id);
                    return $tipMascota->tip_mas_descripcion;
                },
                'filter' => ArrayHelper::map(TipoMascota::find()->all(),'tip_mas_id','tip_mas_descripcion'),
                
            ],

           
           
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
