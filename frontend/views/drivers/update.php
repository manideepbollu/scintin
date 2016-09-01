<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DriverAdditionalDetails */

$this->title = 'Update Driver: ' . ' ' . $employeeModel->first_name;
$this->params['breadcrumbs'][] = ['label' => 'User Management', 'url' => ['user-management/index']];
$this->params['breadcrumbs'][] = ['label' => 'Drivers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $employeeModel->first_name, 'url' => ['view', 'id' => $employeeModel->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="drivers-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'employeeModel' => $employeeModel,
        'driverAdditionalDetailsModel' => $driverAdditionalDetailsModel,
        'task' => 'modifications',
    ]) ?>

</div>
