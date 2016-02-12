<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\modules\kerja\models\DataKerja;

/* @var $this yii\web\View */
/* @var $model app\modules\kerja\models\DataKerja */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Data Kerjas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-kerja-view">
 <?= $this->render('_menu') ?> 
    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'judul',
            'tipe',
            'klien',
            'marketing',
            'programmer',
            'reminder_email:email',
            'status_pekerjaan',
             [
                'attribute'=> 'informasi',
                'format'=>'raw',
                 
            ], 
             ['attribute'=>'status',
            'format'=>'raw',
            'value' =>  DataKerja::data_status($model),
            
          ],
            'created_at',
            'modified_at',
        ],
    ]) ?>

</div>
