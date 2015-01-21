<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Subjects */

//restricting controls as per user role
$webUser = Yii::$app->user;

$this->title = $model->subject_name;
$this->params['breadcrumbs'][] = ['label' => 'Courses + Batches', 'url' => ['courses/overview']];
$this->params['breadcrumbs'][] = ['label' => 'Subjects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="panel panel-default">
    <div class="panel-heading">
        <h1 class="no-m"><?= Html::encode($this->title) ?></h1>
    </div>
    <div class="panel-body">
        <p>
            <?php
            if($webUser->can('update-subject', ['model' => $model]))
                echo Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary'])
            ?>
            <?php
            if($webUser->can('delete-subject', ['model' => $model]))
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
                'subject_name',
                'subject_code',
                'subject_type',
                'iselective',
                'elective_group',
                'parent_type',
                'course_id',
                'batch_id',
                'weekly_classes_max',
                'language',
                'credit_hours',
                'dependant_on',
                'isactive',
                'noexam',
                'created_at',
                'createdBy.username',
                'updated_at',
                'updatedBy.username',
            ],
        ]) ?>
    </div>
</section>
