<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ElectiveGroups */

$this->title = 'Update Elective Groups: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Elective Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="elective-groups-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
