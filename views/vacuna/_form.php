<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Vacuna */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vacuna-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'masc_id')->textInput() ?>

    <?= $form->field($model, 'vac_descripcion')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
