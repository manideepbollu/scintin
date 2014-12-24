<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Students */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="students-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'admission_id')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'roll_number')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'admission_date')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'student_category')->textInput() ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'middle_name')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'father_name')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'mother_name')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'date_of_birth')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'gender')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'marital_status')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'blood_group')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'birth_place')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'nationality_id')->textInput() ?>

    <?= $form->field($model, 'language')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'religion')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'address_line1')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'address_line2')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'state')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'country_id')->textInput() ?>

    <?= $form->field($model, 'phone1')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'phone2')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'issms_enabled')->textInput(['maxlength' => 255]) ?>

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
