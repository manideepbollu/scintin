<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\BusstopsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Busstops';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="panel panel-default">
    <div class="panel-heading">

    <h1 class="no-m"><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    </div>
    <div class="panel-body">

    <p>
        <?= Html::a('Create Busstops', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="table-responsive">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
        [
            'class' => 'yii\grid\SerialColumn',
            'header' => 'S.No',
        ],

            'stop_name',
            'distance',
            // 'notes:ntext',
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
