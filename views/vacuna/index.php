<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VacunaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vacunas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vacuna-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Vacuna', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'vac_id',
            'masc_id',
            'vac_descripcion',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
