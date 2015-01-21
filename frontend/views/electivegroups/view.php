<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\ElectiveGroups */

//restricting controls as per user role
$webUser = Yii::$app->user;

$this->title = $model->group_name;
$this->params['breadcrumbs'][] = ['label' => 'Courses + Batches', 'url' => ['courses/overview']];
$this->params['breadcrumbs'][] = ['label' => 'Elective Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="panel panel-default">
    <div class="panel-heading">
        <h1 class="no-m"><?= Html::encode($this->title) ?></h1>
    </div>
    <div class="panel-body">
        <p>
            <?php
            if($webUser->can('update-electivegroup', ['model' => $model]))
                echo Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary'])
            ?>
            <?php
            if($webUser->can('delete-electivegroup', ['model' => $model]))
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
                'group_name',
                'parent_type',
                'course_id',
                'batch_id',
                'max_subjects',
                'min_subjects',
                'isactive',
                'created_at',
                'created_by',
                'updated_at',
                'updated_by',
            ],
        ]) ?>
    </div>

    <div class="panel-heading">
        <h4 class="no-m"><strong>Elective Subjects</strong> under this Group</h4>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    [
                        'class' => 'yii\grid\SerialColumn',
                        'header' => 'S.No'

                    ],
                    'subject_name',
                    'subject_code',
                    'subject_type',
                    // 'elective_group',
                    'parent_type',
                    // 'course_id',
                    // 'batch_id',
                    // 'weekly_classes_max',
                    // 'language',
                    // 'credit_hours',
                    // 'dependant_on',
                    'noexam',
                    // 'created_at',
                    // 'created_by',
                    // 'updated_at',
                    // 'updated_by',

                    [
                        'class' => 'yii\grid\ActionColumn',
                        'controller' => 'subjects',
                        'contentOptions' => [
                            'class' => 'text-center',
                        ],
                    ],
                ],
            ]); ?>
        </div>
    </div>
</section>
