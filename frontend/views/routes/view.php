<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\Routes */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Routes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="panel panel-default">
    <div class="panel-heading">
        <h1 class="no-m"><?= Html::encode($this->title) ?></h1>
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
            'id',
            'route_code',
            'destination_id',
            'notes:ntext',
            'isactive',
            'created_at',
            'created_by',
            'updated_at',
            'updated_by',
        ],
    ]) ?>

    </div>
    <div class="panel-heading">
        <h4 class="no-m"><strong>Busstops</strong> under this route</h4>
        <?php //echo $this->render('_search', ['model' => $searchModel]); ?>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'stop.stop_name',
                    'stop.lat_coords',
                    'stop.lon_coords',
                    'stop.distance',
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'controller' => 'busstops',
                        'contentOptions' => [
                            'class' => 'text-center',
                        ],
                    ],
                ],
            ]); ?>
        </div>
    </div>
</section>
