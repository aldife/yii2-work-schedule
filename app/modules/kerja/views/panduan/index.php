<?php
use kartik\dynagrid\DynaGrid;
use kartik\grid\GridView; 
use yii\helpers\Html;
//use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\kerja\models\search\DataPanduanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Data Panduans');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-panduan-index">
 <?= $this->render('_menu') ?> 
    <!--<h1><?= Html::encode($this->title) ?></h1>-->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
 

    <?= DynaGrid::widget([
        'options'=>['id'=>Yii::$app->controller->id."-".Yii::$app->controller->action->id."-".Yii::$app->user->identity->id],  
        'gridOptions'=>[ 
            'dataProvider' => $dataProvider,
           
        'filterModel' => $searchModel
 ], 
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],

           // ['attribute'=>'id','visible'=>true],
            ['attribute'=>'judul','visible'=>true],
           
           // 'content:ntext',

             ['class' => 'kartik\grid\ActionColumn'], 
        ],
    ]); ?>

</div>
