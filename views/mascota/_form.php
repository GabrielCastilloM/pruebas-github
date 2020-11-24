<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\TipoMascota;
use app\models\RazaMascota;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;
use app\models\Propietario;



/* @var $this yii\web\View */
/* @var $model app\models\Mascota */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mascota-form">

    <?php $form = ActiveForm::begin(); ?>
     

      
    <?= $form->field($model, 'tip_mas_id')->dropDownList(
    	ArrayHelper::map(TipoMascota::find()->all(),'tip_mas_id','tip_mas_descripcion'),
    	['prompt'=>'Seleccione tipo de mascota']
    ) ?>
    
    <?= $form->field($model, 'mas_raza')->dropDownList(
    	ArrayHelper::map(RazaMascota::find()->all(),'raz_mas_id','raz_mas_descripcion'),
    	['prompt'=>'Seleccione raza de mascota']
    ) ?>

<?= $form->field($model, 'pro_id')->dropDownList(
    	ArrayHelper::map(Propietario::find()->all(),'id','name'),
    	['prompt'=>'Seleccione raza de mascota']
    ) ?>



    <?= $form->field($model, 'mas_nombre')->textInput(['maxlength' => true]) ?>    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
