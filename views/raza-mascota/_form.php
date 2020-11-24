<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\TipoMascota;





/* @var $this yii\web\View */
/* @var $model app\models\RazaMascota */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="raza-mascota-form">

    <?php $form = ActiveForm::begin(); ?>
  

    <?= $form->field($model, 'tip_mas_id')->dropDownList(
    	ArrayHelper::map(TipoMascota::find()->all(),'tip_mas_id','tip_mas_descripcion'),
    	['prompt'=>'Seleccione tipo de mascota']
    ) ?>    

    <?= $form->field($model, 'raz_mas_descripcion')->textInput(['maxlength' => true]) ?>
    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
