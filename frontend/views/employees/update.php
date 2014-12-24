<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Employees */

$this->title = 'Update Employees: ' . ' ' . $model->first_name;
$this->params['breadcrumbs'][] = ['label' => 'User Management', 'url' => ['usermanagement/index']];
$this->params['breadcrumbs'][] = ['label' => 'Employees', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="employees-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'task' => 'modifications',
    ]) ?>

</div>
