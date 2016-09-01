<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Vehicles */

$this->title = 'Create Vehicles';
$this->params['breadcrumbs'][] = ['label' => 'Transport', 'url' => ['transport/index']];
$this->params['breadcrumbs'][] = ['label' => 'Vehicles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
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
