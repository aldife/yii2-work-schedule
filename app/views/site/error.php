<?php
use backend\assets\AppAsset;
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */
/* @var $this \yii\web\View */
/* @var $content string */

 


dmstr\web\AdminLteAsset::register($this);
$this->title = $name;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="login-page">

<?php $this->beginBody() ?>

<!-- Main content -->
<section class="content">

    <div class="error-page">
        <h2 class="headline text-info"><i class="fa fa-warning text-yellow"></i></h2>

        <div class="error-content">
           <br> <h1>404 NOT FOUND</h1>

            <p>
               UPZZ, Halaman yang anda cari tidak di temukan <br>
               <?php echo Html::a('Kembali ke Home',Yii::$app->homeUrl,['class'=>'btn btn-success']);?>
            </p>

            

            
        </div>
    </div>

</section>

<?php $this->endBody() ?>
 
</body>
</html>
<?php $this->endPage() ?>
