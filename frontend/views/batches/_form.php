<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Batches */
/* @var $form yii\widgets\ActiveForm */

/* Date Picker asset has been added to support Date picking feature */
$this->registerAssetBundle('app\assets\DatePickerAsset');
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

    <?= $form->field($model, 'course_id')->dropDownList($courseList) ?>

    <?= $form->field($model, 'head_teacher')->textInput() ?>

    <?= $form->field($model, 'start_date', [
        'inputOptions' => [
            'class' => 'form-control datepicker',
        ],
    ])->textInput() ?>

    <?= $form->field($model, 'end_date', [
        'inputOptions' => [
            'class' => 'form-control datepicker',
        ]
    ])->textInput() ?>


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



