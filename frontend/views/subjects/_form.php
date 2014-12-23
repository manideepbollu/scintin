<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->registerJs('
    function hideElectives(){
        if($("#subjects-iselective").val() == "Elective"){
            if($("#subjects-elective_group").val() == "Not available"){
                alert("Please create an Elective Group prior to creation of Elective Subjects");
                $("#subjects-iselective").val("Mandatory");
            }
            else{
                $(".field-subjects-elective_group").slideDown();
            }
        }
        else{
            $(".field-subjects-elective_group").slideUp();
        }
    }

    function hideCourseBatch(){
            if($("#subjects-parent_type").val() == "Course"){
                $(".field-subjects-course_id").slideDown();
                $(".field-subjects-batch_id").slideUp();
            }
            else if($("#subjects-parent_type").val() == "Batch" && $("#subjects-batch_id").val() != "Not available"){
                    $(".field-subjects-batch_id").slideDown();
                    $(".field-subjects-course_id").slideUp();
            }
            else{
                alert("There are no active batches available in the database");
                $("#subjects-parent_type").val("Course");
            }
    }

    hideCourseBatch();
    hideElectives();

    $("#subjects-iselective").change(function(){
        hideElectives();
    });

    $("#subjects-parent_type").change(function(){
        hideCourseBatch();
    });
');

/* @var $this yii\web\View */
/* @var $model common\models\Subjects */
/* @var $form yii\widgets\ActiveForm */
?>

    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        'fieldConfig' => [
            'labelOptions' => [
                'class' => 'col-md-2 control-label',
            ],
            'template' => '{label}<div class="col-md-8">{input}</div>{error}'
        ],
    ]); ?>

    <?= $form->field($model, 'subject_name')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'subject_code')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'subject_type')->dropDownList($model->subjectTypes) ?>

    <?= $form->field($model, 'iselective')->dropDownList($model->subjectGroups) ?>

    <?= $form->field($model, 'elective_group')->dropDownList($activeElectiveGroups) ?>

    <?= $form->field($model, 'parent_type')->dropDownList($model->parentOptions) ?>

    <?= $form->field($model, 'course_id')->dropDownList($activeCourses) ?>

    <?= $form->field($model, 'batch_id')->dropDownList($activeBatches) ?>

    <?= $form->field($model, 'weekly_classes_max')->textInput() ?>

    <?= $form->field($model, 'language')->textInput() ?>

    <?= $form->field($model, 'credit_hours')->textInput() ?>

    <?= $form->field($model, 'dependant_on')->dropDownList($activeSubjects,[
        'prompt' => '--- None ---'
    ]) ?>

    <?= $form->field($model, 'isactive')->dropDownList($model->subjectStatus) ?>

    <?= $form->field($model, 'noexam')->dropDownList($model->examOptions) ?>


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

