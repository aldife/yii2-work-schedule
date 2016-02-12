<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\kerja\models\DataKerja */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Data Kerja',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Data Kerjas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="data-kerja-update">
 <?= $this->render('_menu') ?> 
    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
