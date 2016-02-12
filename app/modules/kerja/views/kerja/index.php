<?php
use kartik\dynagrid\DynaGrid;
use kartik\grid\GridView; 
use yii\helpers\Html;
use app\modules\kerja\models\DataKerja;
//use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\kerja\models\search\DataKerjaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Data Kerjas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-kerja-index">
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

            //['attribute'=>'id','visible'=>true],
            ['attribute'=>'status',
            'format'=>'raw',
            'filter' => DataKerja::status(),
            'value' => function ($data) {                      
                return DataKerja::data_status($data);
            }, 
           'visible'=>true],
            ['attribute'=>'judul','visible'=>true],
             ['attribute'=>'status_pekerjaan','visible'=>true],
              ['attribute'=>'marketing','visible'=>true],
            ['attribute'=>'programmer','visible'=>true], 
            ['attribute'=>'tipe','visible'=>true],
            ['attribute'=>'klien','visible'=>true],
           
            ['attribute'=>'reminder_email','visible'=>true],
           
           
           // 'informasi:ntext',
           
           ['attribute'=>'created_at','visible'=>false],
           ['attribute'=>'modified_at','visible'=>false],

             ['class' => 'kartik\grid\ActionColumn'], 
        ],
    ]); ?>
 
</div>
