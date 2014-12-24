<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Employees */

$this->title = $model->first_name;
$this->params['breadcrumbs'][] = ['label' => 'User Management', 'url' => ['usermanagement/index']];
$this->params['breadcrumbs'][] = ['label' => 'Employees', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employees-view">

    <h1><?= Html::encode($this->title) ?></h1>

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
        'attributes' => [
            'id',
            'employee_id',
            'joining_date',
            'employee_category',
            'first_name',
            'middle_name',
            'last_name',
            'job_title',
            'employee_position_id',
            'employee_department_id',
            'reporting_manager_id',
            'employee_grade_id',
            'qualification',
            'experience_details:ntext',
            'experience_years',
            'experience_months',
            'father_name',
            'mother_name',
            'spouse_name',
            'date_of_birth',
            'gender',
            'marital_status',
            'children_count',
            'blood_group',
            'birth_place',
            'nationality_id',
            'language',
            'religion',
            'present_address_line1',
            'present_address_line2',
            'present_city',
            'present_state',
            'present_country_id',
            'present_phone1',
            'present_phone2',
            'present_mobile',
            'email:email',
            'fax',
            'permanent_address_line1',
            'permanent_address_line2',
            'permanent_city',
            'permanent_state',
            'permanent_country_id',
            'permanent_phone1',
            'permanent_phone2',
            'photo_file_name',
            'photo_file_type',
            'photo_element_data',
            'description:ntext',
            'isactive',
            'created_at',
            'created_by',
            'updated_at',
            'updated_by',
        ],
    ]) ?>

</div>
