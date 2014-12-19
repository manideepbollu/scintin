<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Courses */

$this->title = 'Create Courses';
$this->params['breadcrumbs'][] = ['label' => 'Courses + Batches', 'url' => ['overview']];
$this->params['breadcrumbs'][] = ['label' => 'Courses', 'url' => ['index']];
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
