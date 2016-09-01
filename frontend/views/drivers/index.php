<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\DriverAdditionalDetailsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Drivers';
$this->params['breadcrumbs'][] = ['label' => 'User Management', 'url' => ['user-management/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="panel panel-default">
    <div class="panel-heading">

    <h1 class="no-m"><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    </div>
    <div class="panel-body">

    <p>
        <?= Html::a('Add Driver', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="table-responsive">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
        [
            'class' => 'yii\grid\SerialColumn',
            'header' => 'S.No',
        ],

            'employee_id',
            'first_name',
            'driverAdditionalDetails.licence_issue_date',
            'driverAdditionalDetails.licence_renewal_date',
            [
                'attribute' => 'driverAdditionalDetails',
                'value' => 'driverAdditionalDetails.licence_number'
            ],
            // 'insurance_number',
            // 'insurance_issue_date',
            // 'insurance_renewal_date',
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
