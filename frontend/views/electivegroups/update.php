<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ElectiveGroups */

$this->title = 'Update Elective Groups: ' . ' ' . $model->group_name;
$this->params['breadcrumbs'][] = ['label' => 'Courses + Batches', 'url' => ['courses/overview']];
$this->params['breadcrumbs'][] = ['label' => 'Elective Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->group_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<section class="panel">
    <header class="panel-heading">
        <h2 class="no-m"><?= Html::encode($this->title) ?></h2>
    </header>
    <div class="panel-body">

        <?= $this->render('_form', [
            'model' => $model,
            'parentOptions' => $parentOptions,
            'listCourses' => $listCourses,
            'listBatches' => $listBatches,
        ]) ?>

    </div>
</section>
