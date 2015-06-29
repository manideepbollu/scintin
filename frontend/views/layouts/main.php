<?php
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\assets\CoreAsset;

/* @var $this \yii\web\View */
/* @var $content string */

CoreAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<!-- body -->

<body>
<?php $this->beginBody() ?>
<div class="app">
<!-- top header -->
<header class="header header-fixed navbar">

    <div class="brand">
        <!-- toggle offscreen menu -->
        <a href="javascript:;" class="ti-menu off-left visible-xs" data-toggle="offscreen" data-move="ltr"></a>
        <!-- /toggle offscreen menu -->

        <!-- logo -->
        <a href="<?= Yii::getAlias('@web') ?>" class="navbar-brand">
            <img src="<?= Yii::getAlias('@web') ?>/img/logo.png" alt="">
                    <span class="heading-font">
                        Scintin
                    </span>
        </a>
        <!-- /logo -->
    </div>

    <ul class="nav navbar-nav">
        <li class="hidden-xs">
            <!-- toggle small menu -->
            <a href="javascript:;" class="toggle-sidebar">
                <i class="ti-menu"></i>
            </a>
            <!-- /toggle small menu -->
        </li>
        <li class="header-search">
            <!-- toggle search -->
            <a href="javascript:;" class="toggle-search">
                <i class="ti-search"></i>
            </a>
            <!-- /toggle search -->
            <div class="search-container">
                <form role="search">
                    <input type="text" class="form-control search" placeholder="type and press enter">
                </form>
            </div>
        </li>
    </ul>

    <ul class="nav navbar-nav navbar-right">

        <li class="dropdown hidden-xs">
            <a href="javascript:;" data-toggle="dropdown">
                <i class="ti-more-alt"></i>
            </a>
            <ul class="dropdown-menu animated fadeInLeft">
                <li class="dropdown-header">Quick Links</li>
                <li>
                    <a href="<?= Yii::$app->urlManager->createUrl('site/about') ?>">About</a>
                </li>
                <li>
                    <a href="<?= Yii::$app->urlManager->createUrl('site/contact') ?>">Contact</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="javascript:;">Help</a>
                </li>
            </ul>
        </li>

        <li class="notifications dropdown">
            <a href="javascript:;" data-toggle="dropdown">
                <i class="ti-bell"></i>
                <div class="badge badge-top bg-danger animated flash">
                    <span>3</span>
                </div>
            </a>
            <div class="dropdown-menu animated fadeInLeft">
                <div class="panel panel-default no-m">
                    <div class="panel-heading small"><b>Notifications</b>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="javascript:;">
                                        <span class="pull-left mt5 mr15">
                                            <img src="<?= Yii::getAlias('@web') ?>/img/faceless.jpg" class="avatar avatar-sm img-circle" alt="">
                                        </span>
                                <div class="m-body">
                                    <div class="">
                                        <small><b>CRYSTAL BROWN</b></small>
                                        <span class="label label-danger pull-right">ASSIGN AGENT</span>
                                    </div>
                                    <span>Opened a support query</span>
                                    <span class="time small">2 mins ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="javascript:;">
                                <div class="pull-left mt5 mr15">
                                    <div class="circle-icon bg-danger">
                                        <i class="ti-download"></i>
                                    </div>
                                </div>
                                <div class="m-body">
                                    <span>Upload Progress</span>
                                    <div class="progress progress-xs mt5 mb5">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                        </div>
                                    </div>
                                    <span class="time small">Submited 23 mins ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="javascript:;">
                                        <span class="pull-left mt5 mr15">
                                            <img src="<?= Yii::getAlias('@web') ?>/img/faceless.jpg" class="avatar avatar-sm img-circle" alt="">
                                        </span>
                                <div class="m-body">
                                    <em>Status Update:</em>
                                    <span>All servers now online</span>
                                    <span class="time small">5 days ago</span>
                                </div>
                            </a>
                        </li>
                    </ul>

                    <div class="panel-footer">
                        <a href="javascript:;">See all notifications</a>
                    </div>
                </div>
            </div>
        </li>
        <li class="off-right">
            <a href="javascript:;" data-toggle="dropdown">
                <img src="<?= Yii::getAlias('@web') ?>/img/faceless.jpg" class="header-avatar img-circle" alt="user" title="user">
                <span class="hidden-xs ml10"><?= Yii::$app->user->identity->username ?></span>
                <i class="ti-angle-down ti-caret hidden-xs"></i>
            </a>
            <ul class="dropdown-menu animated fadeInLeft">
                <li>
                    <a href="javascript:;">Preferences</a>
                </li>
                <li>
                    <a href="javascript:;">Report an issue</a>
                </li>
                <li>
                    <a href="javascript:;">
                        <div class="badge bg-danger pull-right">3</div>
                        <span>Notifications</span>
                    </a>
                </li>
                <li>
                    <a href="<?= Yii::$app->urlManager->createUrl('site/logout') ?>">Logout</a>
                </li>
            </ul>
        </li>
    </ul>
</header>
<!-- /top header -->

<section class="layout">
<!-- sidebar menu -->
<aside class="sidebar offscreen-left">
<!-- main navigation -->
<nav class="main-navigation" data-height="auto" data-size="6px" data-distance="0" data-rail-visible="true" data-wheel-step="10">
<p class="nav-title">MENU</p>
<ul class="nav">
    <!-- dashboard -->
    <li>
        <a href="<?= Yii::getAlias('@web')?>">
            <i class="ti-home"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <!-- /dashboard -->
    <!-- courses overview -->
    <li>
        <a href="javascript:;">
            <i class="toggle-accordion"></i>
            <i class="fa fa-pie-chart"></i>
            <span>Courses + Batches</span>
        </a>
        <ul class="sub-menu">
            <li>
                <a href="<?= Yii::$app->urlManager->createUrl('courses/overview') ?>">
                    <span>Overview</span>
                </a>
            </li>
        </ul>
    </li>
    <!-- /courses overview -->
    <!-- Transport overview -->
    <li>
        <a href="javascript:;">
            <i class="toggle-accordion"></i>
            <i class="fa fa-bus"></i>
            <span>Transport</span>
        </a>
        <ul class="sub-menu">
            <li>
                <a href="<?= Yii::$app->urlManager->createUrl('transport/index') ?>">
                    <span>Overview</span>
                </a>
            </li>
        </ul>
    </li>
    <!-- /Transport overview -->
    <!-- User Management -->
    <li>
        <a href="javascript:;">
            <i class="toggle-accordion"></i>
            <i class="fa fa-user"></i>
            <span>User Management</span>
        </a>
        <ul class="sub-menu">
            <li>
                <a href="<?= Yii::$app->urlManager->createUrl('user-management') ?>">
                    <span>Overview</span>
                </a>
            </li>
        </ul>
    </li>
    <!-- /User Management -->
</ul>


</ul>
<p class="nav-title">QUICK LINKS</p>
<ul class="nav">
    <li>
        <a href="javascript:;">
            <i class="ti-control-record text-success"></i>
            <span>New Admission</span>
        </a>
    </li>
    <li>
        <a href="javascript:;">
            <i class="ti-control-record text-success"></i>
            <span>Manage Batches</span>
        </a>
    </li>
    <li>
        <a href="javascript:;">
            <i class="ti-control-record text-success"></i>
            <span>Manage Roles</span>
        </a>
    </li>
</ul>
</nav>
</aside>
<!-- /sidebar menu -->

<!-- main content -->
<section class="main-content">

    <!-- content wrapper -->
    <div class="content-wrap">

        <!-- inner content wrapper - View content i.e. $content is being passed here -->
        <div class="wrapper">

            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>

        </div>
        <!-- /inner content wrapper -->

    </div>
    <!-- /content wrapper -->
    <a class="exit-offscreen"></a>
</section>
<!-- /main content -->
</section>

</div>

<?php $this->endBody() ?>
</body>
<!-- /body -->

</html>
<?php $this->endPage() ?>
