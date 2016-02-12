<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\widgets\Pjax;

/* @var $this \yii\web\View */
/* @var $content string */
\edgardmessias\assets\nprogress\NProgressAsset::register($this);
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php Pjax::begin();?>
<?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => 'BIMBELKU',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                     [
                        'label' => 'Report Orangtua',
                        'items' => [ 
                              ['label' => 'Absen', 'url' => ['/report_orangtua/absen']],
                              ['label' => 'Belajar', 'url' => ['/report_orangtua/belajar']],
                              ['label' => 'Perkembangan', 'url' => ['/report_orangtua/perkembangan']], 
                        ],
                    ],
                    [
                        'label' => 'Billing Bimbel',
                        'items' => [ 
                              ['label' => 'Tagihan', 'url' => ['/billing_bimbel/tagihan']],
                              ['label' => 'Konfirmasi', 'url' => ['/billing_bimbel/konfirmasi']],
                              ['label' => 'Saldo', 'url' => ['/billing_bimbel/saldo']], 
                        ],
                    ],
                    [
                        'label' => 'Billing Orang Tua',
                        'items' => [ 
                              ['label' => 'Tagihan', 'url' => ['/billing_orangtua/tagihan']],
                              ['label' => 'Konfirmasi', 'url' => ['/billing_orangtua/konfirmasi']],
                              ['label' => 'Saldo', 'url' => ['/billing_orangtua/saldo']], 
                        ],
                    ],
                    [
                        'label' => 'Materi Belajar',
                        'items' => [ 
                              ['label' => 'Jurusan', 'url' => ['/belajar/jurusan']],
                              ['label' => 'Pelajaran', 'url' => ['/belajar/pelajaran']], 
                        ],
                    ],
                    [
                        
                        'label' => 'Users',
                        'items' => [ 
                              ['label' => 'Orang Tua', 'url' => ['/users/orang-tua']],
                              ['label' => 'Murid', 'url' => ['/users/murid']],
                              ['label' => 'Guru', 'url' => ['/users/guru']],
                              ['label' => 'Admin', 'url' => ['/users/admin']],
                        ],
                        
                    ],
                     ['label' => 'SuperAdmin', 'url' => ['/user/admin']],
                             
                        
                        
                   
                    //['label' => 'About', 'url' => ['/site/about']],
                    //['label' => 'User', 'url' => ['/user']],
                    //['label' => 'Contact', 'url' => ['/site/contact']],
                    
                    
                    //['label' => 'Home', 'url' => ['/site/index']],
                    //['label' => 'About', 'url' => ['/site/about']],
                    //['label' => 'Contact', 'url' => ['/site/contact']],
                    //['label' => 'User', 'url' => ['/user']],
                    //Yii::$app->user->isGuest ?
                    //    ['label' => 'Login', 'url' => ['/user/login']] : // or ['/user/login-email']
                    //    ['label' => 'Logout (' . Yii::$app->user->displayName . ')',
                    //        'url' => ['/user/logout'],
                    //        'linkOptions' => ['data-method' => 'post']],
 
                    //Yii::$app->user->isGuest ?
                       //['label' => 'Sign in', 'url' => ['/user/security/login']] :
                       //['label' => 'Sign out (' . Yii::$app->user->identity->username . ')',
                       //    'url' => ['/user/security/logout'],
                       //    'linkOptions' => ['data-method' => 'post']],
                       // ['label' => 'Register', 'url' => ['/user/registration/register'], 'visible' => Yii::$app->user->isGuest]
                       

                    //['label' => 'Home', 'url' => ['/site/index']],
                    //['label' => 'About', 'url' => ['/site/about']],
                    //['label' => 'User', 'url' => ['/user']],
                    //['label' => 'Contact', 'url' => ['/site/contact']],
                    Yii::$app->user->isGuest ?
                        ['label' => 'Login', 'url' => ['/user/security/login']] :
                        ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                            'url' => ['/user/security/logout'],
                            'linkOptions' => ['data-method' => 'post']],
                ],
            ]);
            NavBar::end();
        ?>
        
        <div class="container">
       
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
        
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; My Company <?= date('Y') ?></p>
            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>
<?php Pjax::end();?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
