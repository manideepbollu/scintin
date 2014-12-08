<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\BatchesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Batches';
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- New version -->
<section class="panel panel-default">
    <div class="panel-heading">
        <h1 class="sc-no-m-top sc-no-m-bottom"><?= Html::encode($this->title) ?></h1>
        <?php //echo $this->render('_search', ['model' => $searchModel]); ?>
    </div>
    <div class="panel-body">
        <p>
            <?= Html::a('Create a Batch', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'batch_name',
                'course_id',
                'head_teacher',
                'start_date',
                'end_date',
                // 'created_at',
                // 'created_by',
                // 'updated_at',
                // 'updated_by',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</section>
