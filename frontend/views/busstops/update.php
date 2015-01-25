<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Busstops */

$this->title = 'Update Busstops: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Busstops', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="col-lg-4 col-sm-6 col-xs-12 pull-right pr0">
    <section class="panel" id="transport-icon-wrapper">
        <header class="panel-heading">
            <h2 class="no-m"><?= Html::encode($this->title) ?></h2>
        </header>

        <div class="panel-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </section>
</div>
