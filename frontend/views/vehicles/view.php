<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Vehicles */

$this->title = $model->vehicle_number;
$this->params['breadcrumbs'][] = ['label' => 'Transport', 'url' => ['transport/index']];
$this->params['breadcrumbs'][] = ['label' => 'Vehicles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="panel panel-default">
    <div class="panel-heading">
        <h1 class="no-m"><?= Html::encode($this->title) ?></h1>
        <?php //echo $this->render('_search', ['model' => $searchModel]); ?>
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
            'vehicle_number',
            'vehicle_code',
            'vehicle_type',
            'vehicle_category',
            'date_of_registration',
            'expiry_date',
            'insurance_renewal_date',
            'assigned_driver',
            'capacity',
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
