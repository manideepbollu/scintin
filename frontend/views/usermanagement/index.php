<?php

//AssetBundle specific to FlatIcons is loaded
$this->registerAssetBundle('app\assets\FlatIconsAsset');

//AssetBundle specific to User Charts & Charts Plugin is loaded
$this->registerAssetBundle('app\assets\UserChartsAsset');

//AssetBundle specific to CountTo Plugin is loaded
$this->registerAssetBundle('app\assets\CountToAsset');

//In page JS loaded for CountTo Application i.e.
//counters featuring in this page run on this
$this->registerJs('jQuery(function ($) {
        // start all the timers
        $(".timer").each(count);

        function count(options) {
            var $this = $(this);
            options = $.extend({}, options || {}, $this.data("countToOptions") || {});
            $this.countTo(options);
        }
    });');
?>
<h2 class="ml5 mt10 mb15">User Management <b>Overview</b></h2>
<div class="row">
    <div class="col-sm-3 col-xs-6 text-center icon-box mb25 mt25">
        <a href="javascript:;" class="big-icon-links">
            <i class="flaticon-add99 flx4"></i>
            <div>Add User</div>
        </a>
    </div>
    <div class="col-sm-3 col-xs-6 text-center icon-box mb25 mt25">
        <a href="<?= Yii::$app->urlManager->createUrl('user/index') ?>" class="big-icon-links">
            <i class="flaticon-multiple25 flx4"></i>
            <div>Manage Users</div>
        </a>
    </div>
    <div class="col-sm-3 col-xs-6 text-center icon-box mb25 mt25">
        <a href="javascript:;" class="big-icon-links">
            <i class="flaticon-unlocked46 flx4"></i>
            <div>Create Role</div>
        </a>
    </div>
    <div class="col-sm-3 col-xs-6 text-center icon-box mb25 mt25">
        <a href="<?= Yii::$app->urlManager->createUrl('auth-item/index') ?>" class="big-icon-links">
            <i class="flaticon-folder240 flx4"></i>
            <div>Manage Roles</div>
        </a>
    </div>
    <div class="col-sm-3 col-xs-6 text-center icon-box mb25 mt25">
        <a href="<?= Yii::$app->urlManager->createUrl('students/index') ?>" class="big-icon-links">
            <i class="flaticon-students8 flx4"></i>
            <div>Student Data</div>
        </a>
    </div>
    <div class="col-sm-3 col-xs-6 text-center icon-box mb25 mt25">
        <a href="<?= Yii::$app->urlManager->createUrl('employees/index') ?>" class="big-icon-links">
            <i class="flaticon-teacher38 flx4"></i>
            <div>Employee Data</div>
        </a>
    </div>
    <div class="col-sm-3 col-xs-6 text-center icon-box mb25 mt25">
        <a href="javascript:;" class="big-icon-links">
            <i class="flaticon-teacher10 flx4"></i>
            <div>Parent Data</div>
        </a>
    </div>
</div>
<section class="panel">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-4 text-center">
                <section class="panel">
                    <h5>Enrollment Stats - <b>Segment Wise</b></h5>
                    <div class="flot-pie chart"></div>
                </section>
            </div>
            <div class="col-md-4 text-center">
                <section class="panel">
                    <h5>Scintin <b>Enrollment Status</b></h5>
                    <div class="piechart mt25">
                        <span class="total chart" data-percent="77">
                        <span>
                            <div class="percent"></div>
                            <small>Signed up for Scintin</small>
                        </span>
                        </span>
                    </div>
                </section>
            </div>
            <div class="col-md-4">
                    <div class="m15 pull-right">
                        <span class="h2 count" data-from="0" data-to="680">0</span>
                        <span class="h4">&nbsp;&nbsp;users enrolled on Scintin</span>
                    </div>
                    <div class="m15 pull-right">
                        <span class="h2 count" data-from="0" data-to="927">0</span>
                        <span class="h4">&nbsp;&nbsp;students admitted</span>
                    </div>
                    <div class="m15 pull-right">
                        <span class="h2 count" data-from="0" data-to="68">0</span>
                        <span class="h4">&nbsp;&nbsp;employees working</span>
                    </div>
                    <div class="m15 pull-right">
                        <span class="h2 count" data-from="0" data-to="9">0</span>
                        <span class="h4">&nbsp;&nbsp;active Roles defined</span>
                    </div>
            </div>
        </div>
    </div>
</section>