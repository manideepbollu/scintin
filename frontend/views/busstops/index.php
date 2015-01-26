<?php

use yii\helpers\Html;
use yii\widgets\ListView;

$this->registerJsFile(Yii::$app->urlManager->baseUrl.'/js/gmaps-overview.js', ['depends' => 'app\assets\googleMapsAsset']);
$this->registerJs("
    var jsonDataUrl = '".Yii::$app->urlManager->createUrl('busstops/json-data')."';
    var schoolIcon = '".Yii::$app->urlManager->baseUrl."/img/university.png';
    var subscribeButton = '".Html::a('Subscribe', 'javascript:;', ['class' => 'btn btn-primary'])."'
    ", \yii\web\View::POS_HEAD, 'declare Javascript Variables');


/* @var $this yii\web\View */
/* @var $searchModel common\models\BusstopsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Busstops';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-lg-4 col-sm-5 col-xs-12 pull-right pr0">
<section class="panel panel-default" id="transport-index-wrapper">
    <div class="panel-heading">
        <h1 class="no-m"><?= Html::encode($this->title) ?></h1>
    </div>
    <div class="panel-body">

    <p>
        <?= Html::a('Create Busstops', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="table-responsive">

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => '_list',
    ]) ?>

    </div>
    </div>
</section>
    </div>

