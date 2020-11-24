<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;
use app\models\TipoMascota;

/* @var $this yii\web\View */
/* @var $model app\models\RazaMascota */

$this->title = $model->raz_mas_id;
$this->params['breadcrumbs'][] = ['label' => 'Raza Mascotas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="raza-mascota-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->raz_mas_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->raz_mas_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'raz_mas_id',
            'tip_mas_id',
            'raz_mas_descripcion',

            [
                'attribute' => 'tipo de mascota',
                'value' => TipoMascota::findOne($model->tip_mas_id)->tip_mas_descripcion                  
                
            ],            
        ],
    ]) ?>

</div>
