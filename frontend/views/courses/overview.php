<?php

/* @var $this yii\web\View */

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

$this->title = 'Courses + Batches';
$this->params['breadcrumbs'][] = $this->title;
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
<h2 class="mb20">Courses + <b>Batches</b></h2>

<div class="row">
    <div class="col-md-8">
        <!-- Bollu -> Begin Animated counters -->
        <div class="panel no-b rounded overflow-hidden">
            <div class="panel-body no-p bg-primary">
                <div class="row text-center" style="padding: 40px 0;">
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
        <!-- Bollu -> Begin Animated counters -->

        <!-- Bollu -> Begin Courses, Batches and Subject tab switcher -->
        <div class="box-tab">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#home1" data-toggle="tab">Courses</a>
                </li>
                <li><a href="#profile1" data-toggle="tab">Batches</a>
                </li>
                <li><a href="#settings1" data-toggle="tab">Subjects</a>
                </li>
            </ul>
            <div class="tab-content text-center">
                <div class="tab-pane fade active in" id="home1">
                    <i class="fa fa-book fa-4x mt20"></i>
                    <h3 class="mt10">Courses <b>Overview</b></h3>
                </div>
                <div class="tab-pane fade" id="profile1">
                    <i class="fa fa-copy fa-4x mt20"></i>
                    <h3 class="mt10">Batches <b>Overview</b></h3>
                </div>
                <div class="tab-pane fade" id="settings1">
                    <i class="fa fa-file-text-o fa-4x mt20"></i>
                    <h3 class="mt10">Subjects <b>Overview</b></h3>
                </div>
            </div>
        </div>
    </div>
    <!-- Bollu -> End Courses, Batches and Subject tab switcher -->

    <div class="col-md-4">
        <!-- Bollu -> Begin local search -->
        <div class="input-group mb15">
            <input type="text" class="form-control sc-border-primary" placeholder="Search within this section">
            <span class="input-group-btn">
                <button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button>
            </span>
        </div>
        <!-- Bollu -> End local search -->

        <!-- Bollu -> Begin Collapsible Recent activity and error tabs -->
        <section class="panel bg-none">
            <div class="panel-group" id="accordion">
                <div class="panel">
                    <div class="panel-heading">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                            <span class="badge bg-primary pull-right">5</span>
                            Latest activity in <?= $this->title ?>
                        </a>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="panel-body">
                            Your eyes can deceive you. Don't trust them. I don't know what you're talking about. I am a member of the Imperial Senate on a diplomatic mission to Alderaan-- I care. So, what do you think of her, Han? Look, I can take you as far as Anchorhead. You can get a transport there to Mos Eisley or wherever you're going.
                        </div>
                    </div>
                </div>
                <div class="panel">
                    <div class="panel-heading">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                            <span class="badge bg-red pull-right">2</span>
                            Errors + Warnings
                        </a>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="panel-body">
                            <blockquote>
                                <p>You don’t need to see his identification … These aren’t the droids you’re looking for … He can go about his business … Move along.</p>
                                <small>Obi-Wan Kenobi, Jedi Knight</small>
                            </blockquote>
                        </div>
                    </div>
                </div>
                <div class="panel">
                    <div class="panel-heading">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                            Know more about this section
                        </a>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse">
                        <div class="panel-body">
                            <ul class="pl20">
                                <li>Courses, Batches and their appropriate subjects can be declared and maintained here</li>
                                <li>Students can be added to their respective batches</li>
                                <li>Batches can be assigned to their associated teachers</li>
                                <li><b>Please note:</b> You may not able to see all the available options due to your restricted access. Please contact Admin if you feel like you are missing something</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Bollu -> End Collapsible Recent activity and error tabs -->
    </div>
</div>
<!-- End View content -->




