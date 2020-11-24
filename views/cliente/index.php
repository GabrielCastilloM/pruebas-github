<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClienteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Clientes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cliente-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <!--?= //Html::a('Create Cliente', ['create'], ['class' => 'btn btn-success']) ?-->
    </p>

    <?= Html::button('Create cliente', 
        ['value'=>Url::to(['cliente/create']),
                        'class' => 'btn btn-success','id'=>'modalButton']) ?>
    

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
    <?php
        Modal::begin([
            'header' =>'<h4>Ficha</h4>',
            'id'     =>'modal',
            'size'   =>'modal-lg',
            'clientOptions' => ['backdrop' => 'static', 'keyboard' => FALSE]
            ]);
        echo "<div id='modalContent'> </div>";
        Modal::end();
    ?>    

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nombre',
            'country_id',
            'city_id',

            //['class' => 'yii\grid\ActionColumn'],
            ['class' => 'yii\grid\ActionColumn',
           'contentOptions' => ['style' => 'width: 8.7%'],
           //'visible'=> Yii::$app->user->isGuest ? false : true,
           'buttons'=>[
                    'view'=>function ($url, $model) {
                        return Html::button('<span class="glyphicon glyphicon-eye-open"></span>', 
                                     ['value'=>Url::to(['cliente/view', 'id'=>$model->id]), 
                                      'class' => 'btn btn-default btn-xs custom_button'
                                     ]);
                    },
                    'update'=>function ($url, $model) {
                        return Html::button('<span class="glyphicon glyphicon-pencil"></span>', 
                                     ['value'=>Url::to(['cliente/update', 'id'=>$model->id]),
                                      'class' => 'btn btn-default btn-xs custom_button'
                                      ]);
                    },
                ],
          ],  // fin ActionColum
        ],
    ]); ?>


</div>
