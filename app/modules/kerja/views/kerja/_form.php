<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\kerja\models\DataKerja;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;

/* @var $this yii\web\View */
/* @var $model app\modules\kerja\models\DataKerja */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="data-kerja-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'judul')->textInput(['maxlength' => true]) ?>

 <?= $form->field($model, 'tipe')->dropDownList(DataKerja::tipe(),['maxlength' => true]) ?>
 

    <?= $form->field($model, 'klien')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'marketing')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'programmer')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'reminder_email')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'status_pekerjaan')->textArea(['maxlength' => true]) ?>

 <?php
// $form->field($model, 'informasi')->widget(TinyMce::className(), [
//     'options' => ['rows' => 15],
 
//     'clientOptions' => [
//      'content_style'=>'p {font-size:15px;}',
//         'plugins' => [
//             "advlist autolink lists link charmap print preview anchor",
//             "searchreplace visualblocks code fullscreen",
//             "insertdatetime media table contextmenu paste"
//         ],
//         'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
//     ]
// ]);
 ?>
 
<?php
echo $form->field($model, 'informasi')->widget(CKEditor::className(), [
  
  'editorOptions' => ElFinder::ckeditorOptions(['elfinder', 'path' => 'some/sub/path'],
    [ 'preset'=>Yii::$app->devicedetect->isMobile() ? 'basic':'full',
    'skin'=>'office2013'
     ]),
  
]);
?>



  <?= $form->field($model, 'status')->dropDownList(DataKerja::status(),['maxlength' => true]) ?>

    <?php //= $form->field($model, 'created_at')->textInput() ?>

    <?php //= $form->field($model, 'modified_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
