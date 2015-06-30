<?php

/* @var $this yii\web\View */

$this->title = 'Courses + Batches';

$rbac = Yii::$app->authManager;
$webUser = Yii::$app->user;

//AssetBundle specific to FlatIcons is loaded
$this->registerAssetBundle('app\assets\FlatIconsAsset');

// Bollu - AssetBundle specific to CountTo Plugin is loaded
$this->registerAssetBundle('app\assets\CountToAsset');

// Bollu - In page JS loaded for CountTo Application i.e.
// Animated counters featuring in this page run on this
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
<!-- New version -->
<!-- Begin flash messages if any -->
<?php
    foreach (Yii::$app->session->getAllFlashes() as $key => $message) {
        echo '<div class="alert alert-'. $key .'">' . $message . '</div>';
}
?>
<!-- End flash messages -->

<!-- Begin view content -->
<h2 class="ml5 mt10 mb15">Courses + <b>Batches</b></h2>

<div class="row">
    <div class="col-md-8">
        <!-- Bollu -> Begin Animated counters -->
        <div class="panel no-b rounded overflow-hidden">
            <div class="panel-body no-p bg-primary">
                <div class="row text-center" style="padding: 20px 0;">
                    <div class="col-xs-6 col-sm-3">
                        <span class="h4 show count" data-from="0" data-to="<?= $counters['activeCourses']; ?>">0</span>
                        <small class="text-uppercase">Active courses</small>
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <span class="h4 show count" data-from="0" data-to="<?= $counters['activeBatches']; ?>">0</span>
                        <small class="text-uppercase">Active batches</small>
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <span class="h4 show count" data-from="0" data-to="<?= $counters['subjects']; ?>">0</span>
                        <small class="text-uppercase">Subjects</small>
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <span class="h4 show count" data-from="0" data-to="<?= $counters['activeStudents']; ?>" data-interval="50">0</span>
                        <small class="text-uppercase">Active students</small>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bollu -> End Animated counters -->

        <!-- Bollu -> Begin Courses, Batches and Subject tab switcher -->
        <?php if($rbac->checkAccess($webUser->id, 'view-course')){ ?>
        <div class="col-sm-4 col-xs-6 text-center icon-box mb25 mt25">
            <a href="<?= Yii::$app->urlManager->createUrl('courses/index') ?>" class="big-icon-links">
                <i class="flaticon-archive18 flx4"></i>
                <div>Courses</div>
            </a>
        </div>
        <?php } ?>

        <?php if($rbac->checkAccess($webUser->id, 'view-batch')){ ?>
        <div class="col-sm-4 col-xs-6 text-center icon-box mb25 mt25">
            <a href="<?= Yii::$app->urlManager->createUrl('batches/index') ?>" class="big-icon-links">
                <i class="flaticon-clipboard27 flx4"></i>
                <div>Batches</div>
            </a>
        </div>
        <?php } ?>

        <?php if($rbac->checkAccess($webUser->id, 'view-subject')){ ?>
        <div class="col-sm-4 col-xs-6 text-center icon-box mb25 mt25">
            <a href="<?= Yii::$app->urlManager->createUrl('subjects/index') ?>" class="big-icon-links">
                <i class="flaticon-book131 flx4"></i>
                <div>Subjects</div>
            </a>
        </div>
        <?php } ?>

        <?php if($rbac->checkAccess($webUser->id, 'view-electivegroup')){ ?>
        <div class="col-sm-4 col-xs-6 text-center icon-box mb25 mt25">
            <a href="<?= Yii::$app->urlManager->createUrl('elective-groups/index') ?>" class="big-icon-links">
                <i class="flaticon-clipboard74 flx4"></i>
                <div>Elective Groups</div>
            </a>
        </div>
        <?php } ?>

        <?php if($rbac->checkAccess($webUser->id, 'update-batch')){ ?>
        <div class="col-sm-4 col-xs-6 text-center icon-box mb25 mt25">
            <a href="javascript:;" class="big-icon-links">
                <i class="flaticon-profile3 flx4"></i>
                <div>Batch Assignments</div>
            </a>
        </div>
        <?php } ?>
    </div>
    <!-- Bollu -> End Courses, Batches and Subject tab switcher -->

    <div class="col-md-4 col-xs-12">
        <!-- Bollu -> Begin local search -->
        <div class="input-group mb15">
            <input type="text" class="form-control sc-border-primary" placeholder="Search within this section">
            <span class="input-group-btn">
                <button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button>
            </span>
        </div>
        <!-- Bollu -> End local search -->

        <!-- Bollu -> Know more section begins -->
        <section class="panel">
            <div class="panel-heading">
                Know more about this section
            </div>
            <div class="panel-body">
                <ul class="pl20">
                    <li>Courses, Batches and their appropriate subjects can be declared and maintained here</li>
                    <li>Students can be added to their respective batches</li>
                    <li>Batches can be assigned to their associated teachers</li>
                    <li><b>Please note:</b> You may not able to see all the available options due to your restricted access. Please contact Admin if you feel like you are missing something</li>
                </ul>
            </div>
        </section>
        <!-- Bollu -> Know more section ends -->
    </div>
</div>
<!-- End View content -->




