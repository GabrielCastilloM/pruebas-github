<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Consulta */

$this->title = $model->diagnosticotext;
$this->params['breadcrumbs'][] = ['label' => 'Consultas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="consulta-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=Html::img(Yii::$app->request->baseUrl.'/uploads/'.$model->id,['width'=>'300px'])?>
    
    <?php echo "<br><br>"; ?>
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?=Html::img(Yii::$app->request->baseUrl.'/uploads/'.$model->id,['width'=>'200px'])?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'diagnosticotext:ntext',
            'diagnosticomediun:ntext',
            'foto',
            //'estado',
            [
                'label'=>'Foto',
                'format'=>'raw',
                'value'=>Html::img(Yii::$app->request->baseUrl.'/uploads/'.$model->foto,['width'=>'100px']),
                 
            ],

            [
                'label' => 'Your Image',
                'format' => ['image',['width'=>'50']], 
                'value'=>function($model)
                {
                return('uploads/'.$model->foto);
                },

            ],
        ],
    ]) ?>
    <!--?php
       if ($model->foto!='') {
         echo '<br /><p><img src="'.Yii::$app->request->baseUrl.'/uploads/'.$model->foto. '"></p>';                  
       }    
    ?-->
<!--?= Html::img('@web/img/4.jpg', ['alt'=>'some', 'class'=>'thing', 'width'=>'100px']);?-->
<?=Html::img(Yii::$app->request->baseUrl.'/uploads/'.$model->foto,['width'=>'100px'])?>




</div>
