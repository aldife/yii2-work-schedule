<?php
use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();
$nameAttribute = $generator->getNameAttribute();

echo "<?php\n";
?>
use kartik\dynagrid\DynaGrid;
use kartik\grid\GridView; 
use yii\helpers\Html;
//use <?= $generator->indexWidgetType === 'grid' ? "yii\\grid\\GridView" : "yii\\widgets\\ListView" ?>;

/* @var $this yii\web\View */
<?= !empty($generator->searchModelClass) ? "/* @var \$searchModel " . ltrim($generator->searchModelClass, '\\') . " */\n" : '' ?>
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = <?= $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-index">
 <?php echo "<?=";?> $this->render('_menu') ?> 
    <!--<h1><?= "<?= " ?>Html::encode($this->title) ?></h1>-->
<?php if(!empty($generator->searchModelClass)): ?>
<?= "    <?php " . ($generator->indexWidgetType === 'grid' ? "// " : "") ?>echo $this->render('_search', ['model' => $searchModel]); ?>
<?php endif; ?>
 

<?php if ($generator->indexWidgetType === 'grid'): ?>
    <?= "<?= " ?>DynaGrid::widget([
        'options'=>['id'=>Yii::$app->controller->id."-".Yii::$app->controller->action->id."-".Yii::$app->user->identity->id],  
        'gridOptions'=>[ 
            'dataProvider' => $dataProvider,
           
        <?= !empty($generator->searchModelClass) ? "'filterModel' => \$searchModel\n ], \n        'columns' => [\n" : "'columns' => [\n"; ?>
           // ['class' => 'yii\grid\SerialColumn'],

<?php
$count = 0;
if (($tableSchema = $generator->getTableSchema()) === false) {
    foreach ($generator->getColumnNames() as $name) {
        if (++$count < 6) {
            echo "            ['attribute'=>'" . $name . "','visible'=>true],\n";
        } else {
            echo "            // ['attribute'=>'" . $name . "','visible'=>true],\n";
        }
    }
} else {
    foreach ($tableSchema->columns as $column) {
        $format = $generator->generateColumnFormat($column);
        $form = "            ['attribute'=>'" . $column->name ."','visible'=>true]";
        if (++$count < 6) {
            echo ($format === 'text' ?  $form : "            '".$column->name . ":" . $format."'") . ",\n";
        } else {
            echo ($format === 'text' ?  "//".$form : "            '".$column->name . ":" . $format."'") . ",\n";
        }
    }
}
?>

             ['class' => 'kartik\grid\ActionColumn'], 
        ],
    ]); ?>
<?php else: ?>
    <?= "<?= " ?>ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) {
            return Html::a(Html::encode($model-><?= $nameAttribute ?>), ['view', <?= $urlParams ?>]);
        },
    ]) ?>
<?php endif; ?>

</div>
