<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ElectiveGroups */

$this->title = 'Create Elective Groups';
$this->params['breadcrumbs'][] = ['label' => 'Elective Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="panel">
    <header class="panel-heading">
        <h1 class="no-m"><?= Html::encode($this->title) ?></h1>
    </header>
    <div class="panel-body">

        <?= $this->render('_form', [
            'model' => $model,
            'listCourses' => $listCourses,
            'listBatches' => $listBatches,
        ]) ?>

    </div>
</section>




