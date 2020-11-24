<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TipoMascotaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tipo Mascotas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-mascota-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tipo Mascota', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'tip_mas_id',
            'tip_mas_descripcion',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
