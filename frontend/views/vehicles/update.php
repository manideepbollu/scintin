<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Vehicles */

$this->title = 'Update Vehicles: ' . ' ' . $model->vehicle_number;
$this->params['breadcrumbs'][] = ['label' => 'Transport', 'url' => ['transport/index']];
$this->params['breadcrumbs'][] = ['label' => 'Vehicles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->vehicle_number, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<section class="panel">
    <header class="panel-heading">
        <h1 class="no-m"><?= Html::encode($this->title) ?></h1>
    </header>

    <div class="panel-body">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>

</section>
