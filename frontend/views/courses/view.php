<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\Courses */

//restricting controls as per user role
$webUser = Yii::$app->user;

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
            <?php
            if($webUser->can('update-course', ['model' => $model]))
                echo Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary'])
            ?>
            <?php
            if($webUser->can('delete-course', ['model' => $model]))
                echo Html::a('Delete', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ])
            ?>
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

    <div class="panel-heading">
        <h4 class="no-m"><strong>Batches</strong> under this Course</h4>
        <?php //echo $this->render('_search', ['model' => $searchModel]); ?>
    </div>
    <div class="panel-body">
        <p>
            <?php
            if($webUser->can('create-batch'))
                echo Html::a('Create Batch', ['batches/create', 'id' => $model->id], ['class' => 'btn btn-success'])
            ?>
        </p>
        <div class="table-responsive">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'batch_name',
                    'headTeacher.username',
                    'start_date',
                    'end_date',
                    // 'created_at',
                    // 'created_by',
                    // 'updated_at',
                    // 'updated_by',

                    [
                        'class' => 'yii\grid\ActionColumn',
                        'controller' => 'batches',
                        'contentOptions' => [
                            'class' => 'text-center',
                        ],
                    ],
                ],
            ]); ?>
        </div>
    </div>
</section>
