<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Employees */

$this->title = 'Create Employees';
$this->params['breadcrumbs'][] = ['label' => 'User Management', 'url' => ['user-management/index']];
$this->params['breadcrumbs'][] = ['label' => 'Employees', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employees-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'task' => 'induction',
    ]) ?>

</div>
