<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->registerJs('jQuery(function ($) {

        function hideCourseBatch(){
            if($("#electivegroups-parent_type").val() == "Course"){
                $(".field-electivegroups-course_id").slideDown();
                $(".field-electivegroups-batch_id").slideUp();
            }
            else if($("#electivegroups-parent_type").val() == "Batch"){
                $(".field-electivegroups-batch_id").slideDown();
                $(".field-electivegroups-course_id").slideUp();
            }
            else{
                $(".field-electivegroups-course_id").slideUp();
                $(".field-electivegroups-batch_id").slideUp();
            }
        }

        hideCourseBatch();

        //Toggle Course / batch dropDownList fields as per parent type selection
        $("#electivegroups-parent_type").change(function(){
                hideCourseBatch();
        });

    });');

/* @var $this yii\web\View */
/* @var $model common\models\ElectiveGroups */
/* @var $form yii\widgets\ActiveForm */
?>

    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        'fieldConfig' => [
            'labelOptions' => [
                'class' => 'col-md-2 control-label',
            ],
            'template' => '{label}<div class="col-md-8">{input}</div>{error}',
        ]
    ]); ?>

    <?= $form->field($model, 'group_name')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'parent_type')->dropDownList($parentOptions) ?>

    <?= $form->field($model, 'course_id')->dropDownList($listCourses) ?>

    <?= $form->field($model, 'batch_id')->dropDownList($listBatches) ?>


    <?= $form->field($model, 'max_subjects')->textInput() ?>

    <?= $form->field($model, 'min_subjects')->textInput() ?>

    <?= $form->field($model, 'isactive')->dropDownList([
        'Active' => 'Active',
        'Inactive' => 'Inactive',
    ]) ?>


    <div class="form-group">
        <div class="col-md-2 control-label"></div>
        <div class="col-md-8">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', [
                'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary',
                'type' => 'submit',
            ]) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>






