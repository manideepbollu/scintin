<?php

use yii\helpers\Html;

$this->registerAssetBundle('app\assets\UserManagementAsset');

/* @var $this yii\web\View */
/* @var $model common\models\AuthItem */

$this->title = 'Create New Role';
$this->params['breadcrumbs'][] = ['label' => 'Auth Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="panel">
    <header class="panel-heading">
        <h2 class="no-m"><?= Html::encode($this->title) ?></h2>
    </header>
    <div class="panel-body">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    </div>
</section>

<?= $this->render('_permissiontable') ?>


