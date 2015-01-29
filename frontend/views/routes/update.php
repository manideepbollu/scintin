<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Routes */

$this->title = 'Update Routes: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Routes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
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
