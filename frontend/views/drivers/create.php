<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\DriverAdditionalDetails */

$this->title = 'Create Driver';
$this->params['breadcrumbs'][] = ['label' => 'User Management', 'url' => ['user-management/index']];
$this->params['breadcrumbs'][] = ['label' => 'Drivers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="drivers-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'employeeModel' => $employeeModel,
        'driverAdditionalDetailsModel' => $driverAdditionalDetailsModel,
        'task' => 'induction',
    ]) ?>

</div>
