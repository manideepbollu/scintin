<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Courses */

$this->title = $model->course_name;
$this->params['breadcrumbs'][] = ['label' => 'Courses + Batches', 'url' => ['overview']];
$this->params['breadcrumbs'][] = ['label' => 'Courses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- New version -->
<section class="panel panel-default">
    <div class="panel-heading">
        <h1 class="no-m"><?= Html::encode($this->title) ?></h1>
        <?php //echo $this->render('_search', ['model' => $searchModel]); ?>
    </div>
    <div class="panel-body">
        <p>
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>
        <?= DetailView::widget([
            'model' => $model,
            'template' => "<tr><th class='col-xs-5 col-md-3'>{label}</th><td>{value}</td></tr>",
            'attributes' => [
                'course_name',
                'section_name',
                'course_code',
                'isactive',
                'grading_system',
                'elective_enabled',
                'created_at',
                'createdBy.username',
                'updated_at',
                'updatedBy.username',
            ],
        ]) ?>
    </div>
</section>