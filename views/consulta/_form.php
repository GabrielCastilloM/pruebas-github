<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Consulta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="consulta-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'diagnosticotext')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'diagnosticomediun')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'foto')->fileInput() ?>

    <?= $form->field($model, 'estado')->textInput() ?>

    

    <div class="form-group">
       <?= Html::submitButton($model->isNewRecord ? 'Save' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
   </div>

    <!--<div class="form-group">
       <!?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div-->

    <?php ActiveForm::end(); ?>

</div>
