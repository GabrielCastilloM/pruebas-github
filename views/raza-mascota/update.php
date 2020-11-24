<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RazaMascota */

$this->title = 'Update Raza Mascota: ' . $model->raz_mas_id;
$this->params['breadcrumbs'][] = ['label' => 'Raza Mascotas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->raz_mas_id, 'url' => ['view', 'id' => $model->raz_mas_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="raza-mascota-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
