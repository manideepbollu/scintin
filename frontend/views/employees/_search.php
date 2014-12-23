<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\EmployeesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="employees-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'employee_id') ?>

    <?= $form->field($model, 'joining_date') ?>

    <?= $form->field($model, 'employee_category') ?>

    <?= $form->field($model, 'first_name') ?>

    <?php // echo $form->field($model, 'middle_name') ?>

    <?php // echo $form->field($model, 'last_name') ?>

    <?php // echo $form->field($model, 'job_title') ?>

    <?php // echo $form->field($model, 'employee_position_id') ?>

    <?php // echo $form->field($model, 'employee_department_id') ?>

    <?php // echo $form->field($model, 'reporting_manager_id') ?>

    <?php // echo $form->field($model, 'employee_grade_id') ?>

    <?php // echo $form->field($model, 'qualification') ?>

    <?php // echo $form->field($model, 'experience_details') ?>

    <?php // echo $form->field($model, 'experience_years') ?>

    <?php // echo $form->field($model, 'experience_months') ?>

    <?php // echo $form->field($model, 'father_name') ?>

    <?php // echo $form->field($model, 'mother_name') ?>

    <?php // echo $form->field($model, 'spouse_name') ?>

    <?php // echo $form->field($model, 'date_of_birth') ?>

    <?php // echo $form->field($model, 'gender') ?>

    <?php // echo $form->field($model, 'marital_status') ?>

    <?php // echo $form->field($model, 'children_count') ?>

    <?php // echo $form->field($model, 'blood_group') ?>

    <?php // echo $form->field($model, 'birth_place') ?>

    <?php // echo $form->field($model, 'nationality_id') ?>

    <?php // echo $form->field($model, 'language') ?>

    <?php // echo $form->field($model, 'religion') ?>

    <?php // echo $form->field($model, 'present_address_line1') ?>

    <?php // echo $form->field($model, 'present_address_line2') ?>

    <?php // echo $form->field($model, 'present_city') ?>

    <?php // echo $form->field($model, 'present_state') ?>

    <?php // echo $form->field($model, 'present_country_id') ?>

    <?php // echo $form->field($model, 'present_phone1') ?>

    <?php // echo $form->field($model, 'present_phone2') ?>

    <?php // echo $form->field($model, 'present_mobile') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'fax') ?>

    <?php // echo $form->field($model, 'permanent_address_line1') ?>

    <?php // echo $form->field($model, 'permanent_address_line2') ?>

    <?php // echo $form->field($model, 'permanent_city') ?>

    <?php // echo $form->field($model, 'permanent_state') ?>

    <?php // echo $form->field($model, 'permanent_country_id') ?>

    <?php // echo $form->field($model, 'permanent_phone1') ?>

    <?php // echo $form->field($model, 'permanent_phone2') ?>

    <?php // echo $form->field($model, 'photo_file_name') ?>

    <?php // echo $form->field($model, 'photo_file_type') ?>

    <?php // echo $form->field($model, 'photo_element_data') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'isactive') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
