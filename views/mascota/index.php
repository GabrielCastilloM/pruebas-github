<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Propietario;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MascotaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mascotas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mascota-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Mascota', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'mas_id',
            'tip_mas_id',
            'mas_nombre',
            'mas_raza',
            'pro_id',
            [
                'attribute' => 'pro_id'
                
                
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
