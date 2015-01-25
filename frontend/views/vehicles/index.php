<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\VehiclesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vehicles';
$this->params['breadcrumbs'][] = ['label' => 'Transport', 'url' => ['transport/index']];
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
        <?= Html::a('Create Vehicles', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'vehicle_number',
            'vehicle_code',
            'vehicle_type',
            'vehicle_category',
            // 'date_of_registration',
            'expiry_date',
            // 'insurance_renewal_date',
            'assigned_driver',
            'capacity',
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
