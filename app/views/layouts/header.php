<?php
use yii\helpers\Html;
use app\components\Help;

$f = Help::getProfile();
 

?>
<header class="main-header">

    <?= Html::a('<span class="logo-mini">'.Yii::$app->params['short_name'] .'</span><span class="logo-lg">' . Yii::$app->params['name'] . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
      <!-- <ul class="nav navbar-nav">
           
            <li><a href="#">Superadmin</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li><a href="#">Separated link</a></li>
                <li class="divider"></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li> 
         </ul>-->
        <div class="navbar-custom-menu">
            
  
         
            <ul class="nav navbar-nav">

                <!-- Messages: style can be found in dropdown.less-->
               <!--   -->

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">  
                        <img src="http://gravatar.com/avatar/<?php echo $f->gravatar_id; ?>?s=50" alt="" class="user-image" />
                        
                         <span class="hidden-xs"><?php echo $f->name; ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="http://gravatar.com/avatar/<?php echo $f->gravatar_id; ?>?s=160" class="img-circle"
                                 alt="User Image"/> 
                            <p>
                                <?php echo $f->name; ?> 
                                <small>SuperAdmin</small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body">
                            <div class="col-xs-6 text-center">
                                  <?= Html::a(
                                    'Ubah Profil',
                                    ['/user/settings/profile'],
                                    ['class' => ' ']
                                ) ?>
                            </div>
                            <div class="col-xs-6 text-center">
                                  <?= Html::a(
                                    'Ubah Password',
                                    ['/user/settings/account'],
                                    ['class' => ' ']
                                ) ?>
                            </div>
                            
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            
                            <div class="pull-right">
                                <?= Html::a(
                                    'Keluar',
                                    ['/user/security/logout'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                        </li>
                    </ul>
                </li>

              
            </ul>
        </div>
    </nav>
</header>
