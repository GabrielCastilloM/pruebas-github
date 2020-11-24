<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use kartik\money\MaskMoney; kartik\money\MaskMoney;

/* @var $this yii\web\View */
/* @var $model app\models\Venta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="venta-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'unitario')->textInput() ?>

    <?=  $form->field($model, 'unitario')->widget(MaskMoney::classname(), [
    'pluginOptions' => [
        'prefix' => '$ ',
        'suffix' => ' ¢',
        'allowNegative' => false
    ]
]);?>

    <?= $form->field($model, 'total')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
