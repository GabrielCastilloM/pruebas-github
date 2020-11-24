<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RazaMascota */

$this->title = 'Create Raza Mascota';
$this->params['breadcrumbs'][] = ['label' => 'Raza Mascotas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="raza-mascota-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
