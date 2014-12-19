<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Batches */

$this->title = 'Update Batches: ' . ' ' . $model->batch_name;
$this->params['breadcrumbs'][] = ['label' => 'Courses + Batches', 'url' => ['courses/overview']];
$this->params['breadcrumbs'][] = ['label' => 'Batches', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->batch_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<section class="panel">
    <header class="panel-heading">
        <h2 class="no-m"><?= Html::encode($this->title) ?></h2>
    </header>

    <div class="panel-body">
        <?= $this->render('_form', [
            'model' => $model,
            'courseList' => 'courseList',
        ]) ?>
    </div>

</section>
