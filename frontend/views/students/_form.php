<?php

use yii\widgets\ActiveForm;


/* Date Picker asset has been added to support Date picking feature */
$this->registerAssetBundle('app\assets\DatePickerAsset');
/* Form Wizard asset has been added to support Form Wizard feature */
$this->registerAssetBundle('app\assets\FormWizardAsset');

/* @var $this yii\web\View */
/* @var $model common\models\Students */
/* @var $form yii\widgets\ActiveForm */
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
                    <span class="badge bg-info">3</span>Miscellaneous
                </li>
            </ul>
            <div class="actions btn-group">
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
                            <?= $form->field($model, 'admission_id')->textInput(['maxlength' => 255]) ?>

                            <?= $form->field($model, 'roll_number')->textInput(['maxlength' => 255]) ?>

                            <?= $form->field($model, 'first_name')->textInput(['maxlength' => 255]) ?>

                            <?= $form->field($model, 'middle_name')->textInput(['maxlength' => 255]) ?>

                            <?= $form->field($model, 'last_name')->textInput(['maxlength' => 255]) ?>

                            <?= $form->field($model, 'admission_date', [
                                'inputOptions' => [
                                    'class' => 'form-control datepicker',
                                ],
                            ])->textInput() ?>

                            <?= $form->field($model, 'student_category')->textInput() ?>

                            <?= $form->field($model, 'date_of_birth',[
                                'inputOptions' => [
                                    'class' => 'form-control datepicker',
                                ],
                            ])->textInput() ?>

                            <?= $form->field($model, 'father_name')->textInput(['maxlength' => 255]) ?>

                            <?= $form->field($model, 'mother_name')->textInput(['maxlength' => 255]) ?>
                        </div>
                    </div>
                </div>
                <div class="step-pane" id="step2">
                    <div class="row">
                        <div class="col-md-12">
                            <?= $form->field($model, 'gender')->textInput(['maxlength' => 255]) ?>

                            <?= $form->field($model, 'marital_status')->textInput(['maxlength' => 255]) ?>

                            <?= $form->field($model, 'blood_group')->textInput(['maxlength' => 255]) ?>

                            <?= $form->field($model, 'birth_place')->textInput(['maxlength' => 255]) ?>

                            <?= $form->field($model, 'nationality_id')->textInput() ?>

                            <?= $form->field($model, 'language')->textInput(['maxlength' => 255]) ?>

                            <?= $form->field($model, 'religion')->textInput(['maxlength' => 255]) ?>
                        </div>
                    </div>
                </div>
                <div class="step-pane" id="step3">
                    <div class="row">
                        <div class="col-md-12">
                            <?= $form->field($model, 'address_line1')->textInput(['maxlength' => 255]) ?>

                            <?= $form->field($model, 'address_line2')->textInput(['maxlength' => 255]) ?>

                            <?= $form->field($model, 'city')->textInput(['maxlength' => 255]) ?>

                            <?= $form->field($model, 'state')->textInput(['maxlength' => 255]) ?>

                            <?= $form->field($model, 'country_id')->textInput() ?>

                            <?= $form->field($model, 'phone1')->textInput(['maxlength' => 255]) ?>

                            <?= $form->field($model, 'phone2')->textInput(['maxlength' => 255]) ?>

                            <?= $form->field($model, 'email')->textInput(['maxlength' => 255]) ?>
                        </div>
                    </div>
                </div>
                <div class="step-pane" id="step4">
                    <div class="row">
                        <div class="col-md-12">
                            <?= $form->field($model, 'file')->fileInput() ?>

                            <?= $form->field($model, 'issms_enabled')->textInput(['maxlength' => 255]) ?>

                            <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
                        </div>
                    </div>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
