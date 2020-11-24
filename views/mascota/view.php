<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Mascota;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Mascota */

$this->title = $model->mas_id;
$this->params['breadcrumbs'][] = ['label' => 'Mascotas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="mascota-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->mas_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->mas_id], [
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
            'mas_id',
            'tip_mas_id',
            'mas_nombre',
            'mas_raza',
        ],
    ]) ?>

    <p>


    <?php
        $a = 1;
        $b = 2;
        if ($a > $b) {
             echo Html::a('atender segun tipo de cita', ['/vacuna/index'], ['class'=>'btn btn-primary']); 
        } elseif ($a == $b) {
            echo "a es igual que b";
        } else {
            echo "a es menor que b";
        }
        ?>
    
    <p>

   

</div>
