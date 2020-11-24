<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\City;
use app\models\Country;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Cliente */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cliente-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    
    <?= $form->field($model, 'country_id')->dropDownList(
    ArrayHelper::map(Country::find()->all(), 'id', 'name'),
    [
    'prompt' => 'Selecciona país',
    'onchange' => '$.get("' .
    Yii::$app->urlManager->createUrl('city/list') . '", { id:$(this).val() }).done(
    function(data) {
    $("select#cliente-city_id").html(data);
    });'
    ]
    );
    ?>


    <?= $form->field($model, 'city_id')->dropDownList(
    ArrayHelper::map(City::find()->all(), 'id', 'name'))
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
