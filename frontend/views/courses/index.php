<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CoursesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Courses';
$this->params['breadcrumbs'][] = ['label' => 'Courses + Batches', 'url' => ['overview']];
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
            <?= Html::a('Create Courses', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'course_name',
                // 'section_name',
                'course_code',
                'isactive',
                'grading_system',
                'elective_enabled',
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
</section>

