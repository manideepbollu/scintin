<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Employees */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="employees-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'employee_id')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'joining_date')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'employee_category')->textInput() ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'middle_name')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'job_title')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'employee_position_id')->textInput() ?>

    <?= $form->field($model, 'employee_department_id')->textInput() ?>

    <?= $form->field($model, 'reporting_manager_id')->textInput() ?>

    <?= $form->field($model, 'employee_grade_id')->textInput() ?>

    <?= $form->field($model, 'qualification')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'experience_details')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'experience_years')->textInput() ?>

    <?= $form->field($model, 'experience_months')->textInput() ?>

    <?= $form->field($model, 'father_name')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'mother_name')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'spouse_name')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'date_of_birth')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'gender')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'marital_status')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'children_count')->textInput() ?>

    <?= $form->field($model, 'blood_group')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'birth_place')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'nationality_id')->textInput() ?>

    <?= $form->field($model, 'language')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'religion')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'present_address_line1')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'present_address_line2')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'present_city')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'present_state')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'present_country_id')->textInput() ?>

    <?= $form->field($model, 'present_phone1')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'present_phone2')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'present_mobile')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'fax')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'permanent_address_line1')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'permanent_address_line2')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'permanent_city')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'permanent_state')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'permanent_country_id')->textInput() ?>

    <?= $form->field($model, 'permanent_phone1')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'permanent_phone2')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'photo_file_name')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'photo_file_type')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'photo_element_data')->textInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'isactive')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
