<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \common\models\Courses;

/* @var $this yii\web\View */
/* @var $model common\models\Batches */
/* @var $form yii\widgets\ActiveForm */
?>

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

    <?= $form->field($model, 'batch_name')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'course_id')->dropDownList(Courses::getList()) ?>

    <?= $form->field($model, 'head_teacher')->textInput() ?>

    <?= $form->field($model, 'start_date')->textInput() ?>

    <?= $form->field($model, 'end_date')->textInput() ?>


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



