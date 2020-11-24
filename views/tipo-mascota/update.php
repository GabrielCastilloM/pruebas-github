<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TipoMascota */

$this->title = 'Update Tipo Mascota: ' . $model->tip_mas_id;
$this->params['breadcrumbs'][] = ['label' => 'Tipo Mascotas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tip_mas_id, 'url' => ['view', 'id' => $model->tip_mas_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tipo-mascota-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
