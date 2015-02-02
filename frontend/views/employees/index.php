<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\EmployeesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Employees';
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

        <p><?= Html::a('Add Employee', ['create'], ['class' => 'btn btn-success']) ?></p>

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
                'last_name',
                'joining_date',
                // 'employee_category',
                'job_title',
                // 'middle_name',
                // 'employee_position_id',
                // 'employee_department_id',
                // 'reporting_manager_id',
                // 'employee_grade_id',
                // 'qualification',
                // 'experience_details:ntext',
                // 'experience_years',
                // 'experience_months',
                // 'father_name',
                // 'mother_name',
                // 'spouse_name',
                // 'date_of_birth',
                'gender',
                // 'marital_status',
                // 'children_count',
                // 'blood_group',
                // 'birth_place',
                // 'nationality_id',
                // 'language',
                // 'religion',
                // 'present_address_line1',
                // 'present_address_line2',
                // 'present_city',
                // 'present_state',
                // 'present_country_id',
                // 'present_phone1',
                // 'present_phone2',
                // 'present_mobile',
                // 'email:email',
                // 'fax',
                // 'permanent_address_line1',
                // 'permanent_address_line2',
                // 'permanent_city',
                // 'permanent_state',
                // 'permanent_country_id',
                // 'permanent_phone1',
                // 'permanent_phone2',
                // 'photo_file_name',
                // 'photo_file_type',
                // 'photo_element_data',
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