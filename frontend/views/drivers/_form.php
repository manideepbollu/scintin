<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* Date Picker asset has been added to support Date picking feature */
$this->registerAssetBundle('app\assets\DatePickerAsset');
/* Form Wizard asset has been added to support Form Wizard feature */
$this->registerAssetBundle('app\assets\FormWizardAsset');

/* @var $this yii\web\View */
/* @var $model common\models\DriverAdditionalDetails */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="panel panel-default">
    <div class="panel-body no-p">
        <div id="wizard" class="wizard">
            <ul class="steps">
                <li data-target="#step1" class="active">
                    <span class="badge bg-info">1</span>Basic Details
                </li>
                <li data-target="#step2">
                    <span class="badge bg-info">2</span>Personal Details
                </li>
                <li data-target="#step3">
                    <span class="badge bg-info">3</span>Contact Details
                </li>
                <li data-target="#step4">
                    <span class="badge bg-info">4</span>Job Specific
                </li>
            </ul>
            <div class="btn-group sc-wizard-btns">
                <button class="btn btn-default btn-sm btn-prev mr20">
                    <i class="fa fa-angle-left"></i>&nbsp; Go Back
                </button>
                <button class="btn btn-primary btn-sm btn-next">
                    Continue with <?= $task ?> &nbsp;<i class="fa fa-angle-right"></i>
                </button>
            </div>
        </div>
        <div class="step-content">
            <?php $form = ActiveForm::begin([
                'options' => [
                    'enctype' => 'multipart/form-data',
                ],
                'fieldConfig' => [
                    'options' => [
                        'class' => 'form-group col-md-6',
                    ],
                    'template' => '{label}<div>{input}</div>',
                ],
            ]); ?>
            <div class="step-pane active" id="step1">
                <div class="row">
                    <div class="col-md-12">
                        <?= $form->field($employeeModel, 'employee_id')->textInput(['maxlength' => 255]) ?>

                        <?= $form->field($employeeModel, 'first_name')->textInput(['maxlength' => 255]) ?>

                        <?= $form->field($employeeModel, 'middle_name')->textInput(['maxlength' => 255]) ?>

                        <?= $form->field($employeeModel, 'last_name')->textInput(['maxlength' => 255]) ?>

                        <?= $form->field($employeeModel, 'job_title')->textInput([
                            'maxlength' => 255,
                            'readonly' => 'readonly',
                        ]) ?>

                        <?= $form->field($employeeModel, 'employee_department_id')->textInput() ?>

                        <?= $form->field($employeeModel, 'employee_grade_id')->textInput() ?>

                        <?= $form->field($employeeModel, 'joining_date',  [
                            'inputOptions' => [
                                'class' => 'form-control datepicker',
                            ],
                        ])->textInput() ?>

                        <?= $form->field($employeeModel, 'experience_years')->textInput() ?>

                        <?= $form->field($employeeModel, 'experience_months')->textInput() ?>

                        <?= $form->field($employeeModel, 'experience_details')->textarea(['rows' => 6]) ?>

                    </div>
                </div>
            </div>
            <div class="step-pane" id="step2">
                <div class="row">
                    <div class="col-md-12">
                        <?= $form->field($employeeModel, 'father_name')->textInput(['maxlength' => 255]) ?>

                        <?= $form->field($employeeModel, 'mother_name')->textInput(['maxlength' => 255]) ?>

                        <?= $form->field($employeeModel, 'spouse_name')->textInput(['maxlength' => 255]) ?>

                        <?= $form->field($employeeModel, 'date_of_birth',  [
                            'inputOptions' => [
                                'class' => 'form-control datepicker',
                            ],
                        ])->textInput(['maxlength' => 255]) ?>

                        <?= $form->field($employeeModel, 'gender')->dropDownList($employeeModel->genderOptions,[
                            'prompt' => 'Choose One',
                        ]) ?>

                        <?= $form->field($employeeModel, 'marital_status')->dropDownList($employeeModel->maritalOptions,[
                            'prompt' => 'Choose One',
                        ]) ?>

                        <?= $form->field($employeeModel, 'blood_group')->textInput(['maxlength' => 255]) ?>

                        <?= $form->field($employeeModel, 'birth_place')->textInput(['maxlength' => 255]) ?>

                        <?= $form->field($employeeModel, 'nationality_id')->textInput() ?>

                        <?= $form->field($employeeModel, 'language')->textInput(['maxlength' => 255]) ?>


                    </div>
                </div>
            </div>
            <div class="step-pane" id="step3">
                <div class="row">
                    <div class="col-md-12">
                        <?= $form->field($employeeModel, 'present_address_line1')->textInput(['maxlength' => 255]) ?>

                        <?= $form->field($employeeModel, 'present_address_line2')->textInput(['maxlength' => 255]) ?>

                        <?= $form->field($employeeModel, 'present_city')->textInput(['maxlength' => 255]) ?>

                        <?= $form->field($employeeModel, 'present_state')->textInput(['maxlength' => 255]) ?>

                        <?= $form->field($employeeModel, 'present_country_id')->textInput() ?>

                        <?= $form->field($employeeModel, 'present_phone1')->textInput(['maxlength' => 255]) ?>

                        <?= $form->field($employeeModel, 'present_mobile')->textInput(['maxlength' => 255]) ?>

                        <?= $form->field($employeeModel, 'email')->textInput(['maxlength' => 255]) ?>

                        <div class="col-md-12 no-p"><?= $form->field($employeeModel, 'copyPresentAddress')->checkbox() ?></div>

                        <?= $form->field($employeeModel, 'permanent_address_line1')->textInput(['maxlength' => 255]) ?>

                        <?= $form->field($employeeModel, 'permanent_address_line2')->textInput(['maxlength' => 255]) ?>

                        <?= $form->field($employeeModel, 'permanent_city')->textInput(['maxlength' => 255]) ?>

                        <?= $form->field($employeeModel, 'permanent_state')->textInput(['maxlength' => 255]) ?>

                        <?= $form->field($employeeModel, 'permanent_country_id')->textInput() ?>

                        <?= $form->field($employeeModel, 'permanent_phone1')->textInput(['maxlength' => 255]) ?>

                    </div>
                </div>
            </div>
            <div class="step-pane" id="step4">
                <div class="row">
                    <div class="col-md-12">

                        <?= $form->field($driverAdditionalDetailsModel, 'licence_number')->textInput(['maxlength' => 255]) ?>

                        <?= $form->field($driverAdditionalDetailsModel, 'insurance_number')->textInput(['maxlength' => 255]) ?>


                        <?= $form->field($driverAdditionalDetailsModel, 'licence_issue_date', [
                            'inputOptions' => [
                                'class' => 'form-control datepicker',
                            ],
                        ])->textInput(['maxlength' => 255]) ?>

                        <?= $form->field($driverAdditionalDetailsModel, 'licence_renewal_date', [
                            'inputOptions' => [
                                'class' => 'form-control datepicker',
                            ],
                        ])->textInput(['maxlength' => 255]) ?>


                        <?= $form->field($driverAdditionalDetailsModel, 'insurance_issue_date', [
                            'inputOptions' => [
                                'class' => 'form-control datepicker',
                            ],
                        ])->textInput(['maxlength' => 255]) ?>

                        <?= $form->field($driverAdditionalDetailsModel, 'insurance_renewal_date', [
                            'inputOptions' => [
                                'class' => 'form-control datepicker',
                            ],
                        ])->textInput(['maxlength' => 255]) ?>

                        <?= $form->field($employeeModel, 'file')->fileInput() ?>

                        <?= $form->field($employeeModel, 'description')->textarea(['rows' => 6]) ?>

                    </div>
                </div>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
</div>
