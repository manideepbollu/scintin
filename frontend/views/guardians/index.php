<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\GuardiansSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Guardians';
$this->params['breadcrumbs'][] = ['label' => 'User Management', 'url' => ['usermanagement/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- New version -->
<section class="panel panel-default">
    <div class="panel-heading">
        <h1 class="no-m"><?= Html::encode($this->title) ?></h1>
        <?php //echo $this->render('_search', ['model' => $searchModel]); ?>
    </div>

    <div class="panel-body">

        <p><?= Html::a('Add Guardian for a student', ['create'], ['class' => 'btn btn-success']) ?></p>

        <div class="table-responsive">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'child_admission_id',
                    'first_name',
                    'last_name',
                    'relation',
                    // 'date_of_birth',
                    // 'occupation',
                    // 'income',
                    // 'education',
                     'email:email',
                    // 'office_phone',
                    // 'residence_phone',
                     'mobile_phone',
                    // 'fax',
                    // 'office_address_line1',
                    // 'office_address_line2',
                    // 'office_city',
                    // 'office_state',
                    // 'office_country_id',
                    // 'Residence_address_line1',
                    // 'Residence_address_line2',
                    // 'Residence_city',
                    // 'Residence_state',
                    // 'Residence_country_id',
                    // 'description:ntext',
                     'isactive',
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
