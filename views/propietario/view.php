<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Propietario */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Propietarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="propietario-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=Html::img(Yii::getAlias('@studentImgUrl').'/'. $model->student_image,['width'=>'200px', ])?>  
    <p>
    
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'student_image',
            
            [
                'label' => 'student_image',
                'value' => Yii::getAlias('@studentImgUrl').'/'. $model->student_image,
                'format'=>['image',['width' => '100', 'height' => '100']],
            ],

            
        ],
    ]) ?>



</div>
