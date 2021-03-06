<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Subjects */

$this->title = 'Create Subjects';
$this->params['breadcrumbs'][] = ['label' => 'Courses + Batches', 'url' => ['courses/overview']];
$this->params['breadcrumbs'][] = ['label' => 'Subjects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="panel">
    <header class="panel-heading">
        <h2 class="no-m"><?= Html::encode($this->title) ?></h2>
    </header>
    <div class="panel-body">

        <?= $this->render('_form', [
            'model' => $model,
            'activeElectiveGroups' => $activeElectiveGroups,
            'activeCourses' => $activeCourses,
            'activeBatches' => $activeBatches,
            'activeSubjects' => $activeSubjects,
        ]) ?>

    </div>
</section>




