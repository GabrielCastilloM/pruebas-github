<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TipoMascota */

$this->title = 'Create Tipo Mascota';
$this->params['breadcrumbs'][] = ['label' => 'Tipo Mascotas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-mascota-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
