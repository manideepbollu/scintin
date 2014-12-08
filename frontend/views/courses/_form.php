<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Courses */
/* @var $form yii\widgets\ActiveForm */
?>

<!-- New version -->

    <!-- Form -->
    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        'fieldConfig' => [
            'labelOptions' => [
                'class' => 'col-md-2 control-label',
            ],
            'template' => '{label}<div class="col-md-8">{input}</div>{error}',
        ],
    ]); ?>

    <?= $form->field($model, 'course_name')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'course_code')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'section_name')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'grading_system')->dropDownList($model->gradingSystems) ?>

    <?= $form->field($model, 'isactive')->dropDownList($model->courseStatus) ?>

    <?= $form->field($model, 'elective_enabled')->dropDownList($model->electiveStatus) ?>

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
    <!-- /form -->


 <!-- $form->field($model, 'isactive')->checkbox([
    'template' => '<label class="col-sm-2 control-label">Status</label>
                            <div class="col-sm-10">
                                <div class="checkbox">
                                    <label>
                                        {input}Active
                                    </label>
                                </div>
                                {error}
                            </div>',
]) --> <!-- Above live should be included in <\?= ?\> to get our desired checkbox -->