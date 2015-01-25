<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Busstops */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Busstops', 'url' => ['index']];
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
            'stop_name',
            'lat_coords',
            'lon_coords',
            'distance',
            'notes:ntext',
            'isactive',
            'created_at',
            'created_by',
            'updated_at',
            'updated_by',
        ],
    ]) ?>

    </div>
</section>
