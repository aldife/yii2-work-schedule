<?php
echo "<?php\n";
?>
use yii\bootstrap\Nav;

?>
<?php echo "<?=";?> Nav::widget([
    'options' => [
        'class' => 'nav-tabs',
        'style' => 'margin-bottom: 15px',
    ],
    'items' => [
        [
            'label'   => 'Kelola',
            'url'     => [Yii::$app->controller->id.'/index'],
        ],
        [
            'label'   => 'Buat baru',
            'url'     => [Yii::$app->controller->id.'/create'],
           
        ], 
    ],
]) ?> 