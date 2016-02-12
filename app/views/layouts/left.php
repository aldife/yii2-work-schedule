 <?php
 
use app\components\Help;

$f = Help::getProfile();
?>

<aside class="main-sidebar">

    <section class="sidebar">
 <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image"> 
       <img src="http://gravatar.com/avatar/<?php echo $f->gravatar_id; ?>?s=50" class="img-circle"
                                 alt="User Image"/> 
                            <p>
                               
        </div>
        <div class="pull-left info">
          <p> <?php echo $f->name; ?> </p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],

                'items' => [
                    
                      ## MODULES ORDER MENU
                    ['label' => 'Home', 'options' => ['class' => 'header']], 
                    ['label' => 'Kerja',
                     'icon' => 'fa fa-circle',
                     'url' => ['/kerja/kerja']
                     ],
                     ['label' => 'Panduan',
                     'icon' => 'fa fa-circle',
                     'url' => ['/kerja/panduan']
                     ],


                  
                    
                     ## SUPERADMIN 
                    ['label' => 'SUPERADMIN',  'visible' => Yii::$app->user->can('superadmin'), 'options' => ['class' => 'header']],
                    [
                        'label' => 'Superadmin',
                        'icon' => 'fa fa-circle-o', 
                        'visible' => Yii::$app->user->can('superadmin'),
                        'url' =>  ['/user/admin'], 
                    ],
                    [
                        'label' => 'Hak Akses',
                        'icon' => 'fa fa-circle-o',
                         'visible' => Yii::$app->user->can('superadmin'),
                        'url' => ['/rbac/permission/index'] 
                    ], 
                    
                    ## YII2 MENU 
                    ['label' => 'Yii2', 'visible'=>YII_DEBUG, 'options' => ['class' => 'header']],
                    ['label' => 'Gii', 'visible'=>YII_DEBUG, 'icon' => 'fa fa-file-code-o', 'url' => ['/gii']],
                    ['label' => 'Debug', 'visible'=>YII_DEBUG, 'icon' => 'fa fa-dashboard', 'url' => ['/debug']],
                    //['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    
                ],
            ]
        ) ?>

    </section>

</aside>
