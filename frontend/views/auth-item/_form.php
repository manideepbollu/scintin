<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\AuthItem */
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

<?= $form->field($model, 'name')->textInput(['maxlength' => 64]) ?>

<?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

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
