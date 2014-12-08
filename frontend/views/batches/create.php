<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Batches */

$this->title = 'Create Batches';
$this->params['breadcrumbs'][] = ['label' => 'Batches', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="panel">
    <header class="panel-heading">
        <h1 class="scintin-h1"><?= Html::encode($this->title) ?></h1>
    </header>

    <div class="panel-body">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>

</section>