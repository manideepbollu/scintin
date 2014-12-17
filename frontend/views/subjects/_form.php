<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

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

    <?= $form->field($model, 'subject_type')->dropDownList([
        'Theory' => 'Theory',
        'Particles' => 'Particles',
    ]) ?>

    <?= $form->field($model, 'iselective')->dropDownList([
        'Yes' => 'Yes',
        'No' => 'No',
    ]) ?>

    <?= $form->field($model, 'elective_group')->dropDownList($activeElectiveGroups) ?>

    <?= $form->field($model, 'parent_type')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'course_id')->textInput() ?>

    <?= $form->field($model, 'batch_id')->textInput() ?>

    <?= $form->field($model, 'weekly_classes_max')->textInput() ?>

    <?= $form->field($model, 'language')->textInput() ?>

    <?= $form->field($model, 'credit_hours')->textInput() ?>

    <?= $form->field($model, 'dependant_on')->textInput() ?>

    <?= $form->field($model, 'isactive')->dropDownList([
        'Active' => 'Active',
        'In Active' => 'In Active',
    ]) ?>

    <?= $form->field($model, 'noexam')->dropDownList([
        'Yes' => 'Yes',
        'No' => 'No',
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


