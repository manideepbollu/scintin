<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\DriverAdditionalDetailsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="driver-additional-details-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'employee_id') ?>

    <?= $form->field($model, 'licence_number') ?>

    <?= $form->field($model, 'licence_issue_date') ?>

    <?= $form->field($model, 'licence_renewal_date') ?>

    <?php // echo $form->field($model, 'insurance_number') ?>

    <?php // echo $form->field($model, 'insurance_issue_date') ?>

    <?php // echo $form->field($model, 'insurance_renewal_date') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
