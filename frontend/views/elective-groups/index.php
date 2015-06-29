<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ElectiveGroupsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//restricting controls as per user role
$webUser = Yii::$app->user;

$this->title = 'Elective Groups';
$this->params['breadcrumbs'][] = ['label' => 'Courses + Batches', 'url' => ['courses/overview']];
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- New version -->
<section class="panel panel-default">
    <div class="panel-heading">
        <h1 class="no-m"><?= Html::encode($this->title) ?></h1>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="panel-body">
        <p>
            <?php
            if($webUser->can('create-electivegroup'))
                echo Html::a('Create Elective Group', ['create'], ['class' => 'btn btn-success'])
            ?>
        </p>

        <div class="table-responsive">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    [
                        'class' => 'yii\grid\SerialColumn',
                        'header' => 'S.No'
                    ],

                    'group_name',
                    'parent_type',
                    'course.course_name',
                    'batch.batch_name',
                    'max_subjects',
                    'min_subjects',
                    'isactive',
                    // 'created_at',
                    // 'created_by',
                    // 'updated_at',
                    // 'updated_by',

                    [
                        'class' => 'yii\grid\ActionColumn',
                        'contentOptions' => [
                            'class' => 'text-center',
                        ],
                    ],
                ],
            ]); ?>
        </div>
    </div>
</section>

