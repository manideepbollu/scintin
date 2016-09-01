<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* Date Picker asset has been added to support Date picking feature */
$this->registerAssetBundle('app\assets\DatePickerAsset');
/* Form Wizard asset has been added to support Form Wizard feature */
$this->registerAssetBundle('app\assets\FormWizardAsset');

/* @var $this yii\web\View */
/* @var $model common\models\Guardians */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="panel panel-default">
    <div class="panel-body no-p">
        <div id="wizard" class="wizard">
            <ul class="steps">
                <li data-target="#step1" class="active">
                    <span class="badge bg-info">1</span>Personal Details
                </li>
                <li data-target="#step2">
                    <span class="badge bg-info">2</span>Contact Details
                </li>
                <li data-target="#step3">
                    <span class="badge bg-info">3</span>Miscellaneous
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
                        <?= $form->field($model, 'child_admission_id')->textInput() ?>

                        <?= $form->field($model, 'first_name')->textInput(['maxlength' => 255]) ?>

                        <?= $form->field($model, 'last_name')->textInput(['maxlength' => 255]) ?>

                        <?= $form->field($model, 'date_of_birth' ,  [
                            'inputOptions' => [
                                'class' => 'form-control datepicker',
                            ],
                        ])->textInput() ?>

                        <?= $form->field($model, 'gender')->dropDownList($model->genderOptions); ?>

                        <?= $form->field($model, 'relation')->textInput(['maxlength' => 255]) ?>

                        <?= $form->field($model, 'occupation')->textInput(['maxlength' => 255]) ?>

                        <?= $form->field($model, 'income')->textInput() ?>

                        <?= $form->field($model, 'education')->textInput(['maxlength' => 255]) ?>

                        <?= $form->field($model, 'email')->textInput(['maxlength' => 255]) ?>
                    </div>
                </div>
            </div>
            <div class="step-pane" id="step2">
                <div class="row">
                    <div class="col-md-12">

                        <?= $form->field($model, 'residence_address_line1')->textInput(['maxlength' => 255]) ?>

                        <?= $form->field($model, 'residence_address_line2')->textInput(['maxlength' => 255]) ?>

                        <?= $form->field($model, 'residence_city')->textInput(['maxlength' => 255]) ?>

                        <?= $form->field($model, 'residence_state')->textInput(['maxlength' => 255]) ?>

                        <?= $form->field($model, 'residence_country_id')->textInput() ?>

                        <?= $form->field($model, 'residence_phone')->textInput(['maxlength' => 255]) ?>

                        <?= $form->field($model, 'office_address_line1')->textInput(['maxlength' => 255]) ?>

                        <?= $form->field($model, 'office_address_line2')->textInput(['maxlength' => 255]) ?>

                        <?= $form->field($model, 'office_city')->textInput(['maxlength' => 255]) ?>

                        <?= $form->field($model, 'office_state')->textInput(['maxlength' => 255]) ?>

                        <?= $form->field($model, 'office_country_id')->textInput() ?>

                        <?= $form->field($model, 'office_phone')->textInput(['maxlength' => 255]) ?>

                        <?= $form->field($model, 'mobile_phone')->textInput(['maxlength' => 255]) ?>

                        <?= $form->field($model, 'fax')->textInput(['maxlength' => 255]) ?>
                    </div>
                </div>
            </div>
            <div class="step-pane" id="step3">
                <div class="row">
                    <div class="col-md-12">
                        <?= $form->field($model, 'file')->fileInput() ?>

                        <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
                    </div>
                </div>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
</div>
