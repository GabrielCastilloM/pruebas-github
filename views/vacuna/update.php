<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Vacuna */

$this->title = 'Update Vacuna: ' . $model->vac_id;
$this->params['breadcrumbs'][] = ['label' => 'Vacunas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->vac_id, 'url' => ['view', 'id' => $model->vac_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="vacuna-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
