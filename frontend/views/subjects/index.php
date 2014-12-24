<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SubjectsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Subjects';
$this->params['breadcrumbs'][] = ['label' => 'Courses + Batches', 'url' => ['courses/overview']];
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
            <?= Html::a('Create a Subject', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
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
                    'iselective',
                    // 'elective_group',
                    // 'parent_type',
                    // 'course_id',
                    // 'batch_id',
                    // 'weekly_classes_max',
                    // 'language',
                    // 'credit_hours',
                    // 'dependant_on',
                    'isactive',
                    'noexam',
                    // 'created_at',
                    // 'created_by',
                    // 'updated_at',
                    // 'updated_by',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>
</section>