<?php

$this->title = 'Transport';

use yii\helpers\Html;

//AssetBundle specific to FlatIcons is loaded
$this->registerAssetBundle('app\assets\FlatIconsAsset');
$this->registerJsFile(Yii::$app->urlManager->baseUrl.'/js/gmaps-overview.js', ['depends' => 'app\assets\GoogleMapsAsset']);
$this->registerJs("
    var jsonDataUrl = '".Yii::$app->urlManager->createUrl('busstops/json-data')."';
    var schoolIcon = '".Yii::$app->urlManager->baseUrl."/img/university.png';
    var subscribeButton = '".Html::a('Subscribe', 'javascript:;', ['class' => 'btn btn-primary'])."'
    ", \yii\web\View::POS_HEAD, 'declare Javascript Variables');

?>
    <div class="row" id="transport-icon-wrapper">
        <div class="col-lg-12 text-center">
            <h4 class="mt10 mb0">Transport <b>Overview</b></h4>
            <div class="col-lg-2 col-md-3 col-xs-6 text-center icon-box mb25 mt25">
                <a href="<?= Yii::$app->urlManager->createUrl('routes/index') ?>" class="big-icon-links">
                    <i class="flaticon-pointer16 flx3   "></i>
                    <div>Route Data</div>
                </a>
            </div>
            <div class="col-lg-2 col-md-3 col-xs-6 text-center icon-box mb25 mt25">
                <a href="<?= Yii::$app->urlManager->createUrl('busstops/index') ?>" class="big-icon-links">
                    <i class="flaticon-route flx3"></i>
                    <div>Bus Stops</div>
                </a>
            </div>
            <div class="col-lg-2 col-md-3 col-xs-6 text-center icon-box mb25 mt25">
                <a href="javascript:;" class="big-icon-links">
                    <i class="flaticon-pilot flx3"></i>
                    <div>Driver Data</div>
                </a>
            </div>
            <div class="col-lg-2 col-md-3 col-xs-6 text-center icon-box mb25 mt25">
                <a href="javascript:;" class="big-icon-links">
                    <i class="flaticon-idcard flx3"></i>
                    <div>Subscribe</div>
                </a>
            </div>
            <div class="col-lg-2 col-md-3 col-xs-6 text-center icon-box mb25 mt25">
                <a href="<?= Yii::$app->urlManager->createUrl('vehicles/index') ?>" class="big-icon-links">
                    <i class="flaticon-bus28 flx3"></i>
                    <div>Vehicle Data</div>
                </a>
            </div>
            <div class="col-lg-2 col-md-3 col-xs-6 text-center icon-box mb25 mt25">
                <a href="javascript:;" class="big-icon-links">
                    <i class="flaticon-file98 flx3"></i>
                    <div>Data Analysis</div>
                </a>
            </div>
        </div>
    </div>