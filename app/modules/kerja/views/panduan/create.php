<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\kerja\models\DataPanduan */

$this->title = Yii::t('app', 'Create Data Panduan');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Data Panduans'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-panduan-create">
 <?= $this->render('_menu') ?> 
    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
